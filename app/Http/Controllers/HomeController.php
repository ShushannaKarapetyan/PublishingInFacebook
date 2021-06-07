<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        try {
            $endpoint = "https://graph.facebook.com/me";
            $access_token = session('user_access_token');
            $client = new Client();

            $responseGroups = $client->request('GET', $endpoint, ['query' => [
                'fields' => 'groups',
                'access_token' => $access_token,
            ]]);

            $responsePages = $client->request('GET', $endpoint, ['query' => [
                'fields' => 'accounts',
                'access_token' => $access_token,
            ]]);

            $groups = json_decode($responseGroups->getBody(), true)['groups']['data'];
            $pages = json_decode($responsePages->getBody(), true)['accounts']['data'];

            return view('home', compact(["groups", "pages"]));

        } catch (GuzzleException $exception) {
            dd($exception);
        }
    }
}
