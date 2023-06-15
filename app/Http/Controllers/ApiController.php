<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        $response_on_going = Http::get('https://otakudesu-anime-api.vercel.app/api/v1/ongoing/1');
        $response_completed = Http::get('https://otakudesu-anime-api.vercel.app/api/v1/completed/1');

        if($response_on_going->ok() && $response_completed->ok()) {
            $data_on_going = $response_on_going->json();
            $data_on_going["ongoing"] = array_slice($data_on_going["ongoing"], 0, 6);

            // Fungsi untuk mendapatkan data detail anime berdasarkan endpoint
            function getAnimeDetail($endpoint) {
                $response = Http::get("https://otakudesu-anime-api.vercel.app/api/v1/detail/$endpoint");

                if($response->ok()) {
                    $data = $response->json();
                    $data = [
                        'genre' => explode(', ', explode(': ', $data["anime_detail"]["detail"][10])[1]),
                        'total_eps' => explode(': ', $data["anime_detail"]["detail"][6])[1],
                    ];
                    return $data;
                } else {
                    return null;
                }
            }

            // Ambil data detail untuk setiap endpoint yang sama
            foreach ($data_on_going["ongoing"] as &$item) {
                $endpoint = $item['endpoint'];
                $item['anime_detail'] = getAnimeDetail($endpoint);
            }
            
            $data_completed = $response_completed->json();
            $data_completed["completed"] = array_slice($data_completed["completed"], 0, 6);

            // Ambil data detail untuk setiap endpoint yang sama
            foreach ($data_completed["completed"] as &$item) {
                $endpoint = $item['endpoint'];
                $item['anime_detail'] = getAnimeDetail($endpoint);
            }

            // dd($data_completed);
            return view('index', [
                'data_on_going' => $data_on_going["ongoing"],
                'data_completed' => $data_completed["completed"],
            ]);

        } else {
            dd('gagal koneksi api');
        }
    }
    
    public function detail($endpoint)
    {
        $response = Http::get("https://otakudesu-anime-api.vercel.app/api/v1/detail/$endpoint");

        if($response->ok()) {
            $data = $response->json();

            // dd($data);
            return view('detail', [
                'data' => $data
            ]);

        } else {
            dd('gagal koneksi api');
        }
    }

    public function stream($endpoint)
    {
        $response = Http::get("https://otakudesu-anime-api.vercel.app/api/v1/episode/$endpoint");

        if($response->ok()) {
            $data = $response->json();

            // dd($data["relative"]);
            return view('stream', [
                'data' => $data
            ]);

        } else {
            dd('gagal koneksi api');
        }
    }
}
