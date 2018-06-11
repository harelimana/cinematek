<?php
/**
 * Created by PhpStorm.
 * User: axxahretz
 * Date: 11.06.18
 * Time: 20:32
 */

namespace App\Controller;


use App\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    public function index()
    {
        $films = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findAll();
        return $this->render('author/viewAuthorFilm.html.twig', [
            'film' => $films,
        ]);
    }
}