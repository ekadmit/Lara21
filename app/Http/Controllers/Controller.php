<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //список новостей
    protected array $newsList = [
        [
            'id' => 1,
            'title' => 'Greece wildfires: PM describes nightmarish summer',
            'description' => 'Greece\'s prime minister has talked of a nightmarish summer as forest fires continue to ravage the country.
             Thousands have been evacuated from their homes, and more than 1,000 firefighters have been deployed to bring the flames under control.',
            'category_id' => 3
        ],
        [
            'id' => 2,
            'title' => 'Tokyo Olympics: US women win a record seventh basketball gold medal',
            'description' => 'DA blistering United States outplayed hosts Japan to win a seventh successive women\'s basketball gold on Tokyo 2020\'s
             final day of action. Celebrated veterans Sue Bird and Diana Taurasi become the first players to win five Olympic basketball titles.',
            'category_id' => 1
        ],
        [
            'id' => 3,
            'title' => 'England v India: Rain delays start as tourists chase 209 to win',
            'description' => 'Persistent rain delayed the start of what could be a grandstand final day in the first
             Test between England and India at Trent Bridge.
             Wet weather lingered throughout Sunday morning in Nottingham and wiped out the morning session.',
            'category_id' => 1
        ],
        [
            'id' => 4,
            'title' => 'Lionel Messi: Would he give PSG football\'s best front three - and where would they rank in 21st-century attacking trios?',
            'description' => 'Financial Fair Play will complicate matters, even for PSG, but Messi heading to Paris raises
             the tantalising prospect of a reunion with former Barcelona team-mate Neymar, and linking up with Kylian Mbappe,
             widely regarded as the heir to Messi\'s throne as the best player in the world.',
            'category_id' => 2
        ]

    ];

    //список категорий
    protected array $categoryList = [
        [
          'id' => 1,
          'title' => 'Politics'
        ],
        [
            'id' => 2,
            'title' => 'Economy'
        ],
        [
            'id' => 3,
            'title' => 'Social'
        ],
    ];

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
