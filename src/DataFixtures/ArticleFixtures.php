<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article
            ->setTitle('Lorem')
            ->setPublicationDate(new \DateTime)
            ->setContent('Vivamus convallis lobortis metus. *Ut porta tristique ultricies*.

Interdum et malesuada fames ac ante ipsum primis in faucibus. 
- Maecenas massa risus, tincidunt ut nunc et, vestibulum viverra lectus.
- Fusce semper eleifend nunc, sed euismod nisl faucibus a.
- Donec vel pellentesque enim, id imperdiet ipsum.

Suspendisse enim dui, tristique vel ultrices non, euismod eu turpis.
Etiam vitae condimentum lectus. Suspendisse scelerisque at diam interdum sollicitudin. Nam ullamcorper lorem ut mollis elementum.');
        
        $manager->persist($article);
        $manager->flush();
    }
}
