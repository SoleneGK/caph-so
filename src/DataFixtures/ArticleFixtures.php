<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public const ARTICLE1 = 'article1';

    public function load(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1
            ->setTitle('Lorem')
            ->setPublicationDate(new \DateTime('2021-01-15'))
            ->setContent('Vivamus convallis lobortis metus. *Ut porta tristique ultricies*.

Interdum et malesuada fames ac ante ipsum primis in faucibus. 
- Maecenas massa risus, tincidunt ut nunc et, vestibulum viverra lectus.
- Fusce semper eleifend nunc, sed euismod nisl faucibus a.
- Donec vel pellentesque enim, id imperdiet ipsum.

Suspendisse enim dui, tristique vel ultrices non, euismod eu turpis.
Etiam vitae condimentum lectus. Suspendisse scelerisque at diam interdum sollicitudin. Nam ullamcorper lorem ut mollis elementum.');
        $manager->persist($article1);
        
        $article2 = new Article();
        $article2
            ->setTitle('Aenean et pretium augue, in egestas sapien')
            ->setPublicationDate(new \DateTime('2021-04-20'))
            ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus purus ut suscipit dignissim. Cras blandit lacinia ex sed molestie. Morbi massa ante, lacinia in nulla sed, pretium egestas dui. Aliquam erat volutpat. Sed cursus magna vitae sem tristique convallis. Curabitur consequat neque erat, viverra porta mauris pharetra ut. Sed in nisl sit amet tellus blandit tincidunt. Morbi placerat elit nibh, id mattis magna euismod non. Fusce ante ante, mattis quis finibus quis, ornare sed lacus. Donec ultricies auctor molestie. Ut malesuada sagittis odio a convallis. Integer a neque ligula. Sed eget aliquam arcu, quis efficitur ipsum. Vivamus viverra, ante ac consequat porttitor, lectus dui sollicitudin quam, eget mollis ex lectus in diam.');
        $manager->persist($article2);
        
        $manager->flush();

        $this->addReference(self::ARTICLE1, $article1);
    }
}
