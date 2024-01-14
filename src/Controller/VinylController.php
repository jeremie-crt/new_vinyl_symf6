<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(Request $request): Response
    {
        $routeName = $request->attributes->all();
        dump($routeName);
        die('there!!');
        $title = 'List of Songs';

        $tracks = [
            ['artist' => 'Bob Marley', 'song' => 'Soldier'],
            ['artist' => 'MJ', 'song' => 'Thriller'],
            ['artist' => 'Tupac', 'song' => 'Changes'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => $title,
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}