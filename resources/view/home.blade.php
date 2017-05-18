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
            <div class="summoner_name">{{ \System\Session::get('summoner') }} - {{ $matches->totalGames }} Dereceli Maç</div>
        </div>
    </div>
    <div class="body">
        <div class="matches">
            @php
                $i = 0;
            @endphp
            @foreach ($matches->matches as $match)
            @php
                $champion = \Database\Databases\Lol\ChampionTable::find($match->champion);
            @endphp
            @if($i == 0)
                <style>
                    body {background: #000; }
                </style>
                <div class="backdrop" style="background-image: url('https://lolstatic-a.akamaihd.net/game-info/1.1.9/images/champion/backdrop/bg-{{ strtolower($champion->champ_key)  }}.jpg')"></div>
                @php
                    $i = 1;
                @endphp
            @endif
            <div class="match">

                <div class="match_head">
                        <img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/champion/{{ trim($champion->champ_key) }}.png" alt="">
                    <div class="match_title">
                        {{ $champion->name  }} - {{ $match->lane  }}
                        @if($match->role != 'NONE')
                            ({{ $match->role }})
                        @endif
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
