<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> {{ $title }}</title>

  {!! $css !!}

</head>
<body>

<div>
    <div class="head">
        <div class="summoner">
            <div class="summoner_img">
                <img src="https://avatar.leagueoflegends.com/tr/{{ \System\Session::get('summoner') }}.png" alt="">
            </div>
            <div class="summoner_name">{{ \System\Session::get('summoner') }}</div>
        </div>
    </div>
    <div class="body">
        <div class="matches">
            @foreach ($matches->matches as $match)
            @php
                $champion = \Database\Databases\Lol\ChampionTable::find($match->champion);
            @endphp
            <div class="match">

                <div class="match_head">
                    <div class="match_image">
                        <img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/champion/{{ trim($champion->champ_key) }}.png" alt="">
                    </div>
                    <div class="match_title">
                        {{ $champion->name  }}
                    </div>
                </div>
                <div class="match_body">

                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

  {!! $js !!}

</body>
</html>
