<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', name: 'api_songs_get_one', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): JsonResponse
    {
        $data = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returning data for song: {song}', [
            'song' => $id
        ]);

        return $this->json($data);
    }
}