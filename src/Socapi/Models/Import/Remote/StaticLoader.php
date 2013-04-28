<?php

namespace Socapi\Models\Import\Remote;

class StaticLoader implements Loader
{
    private
        $season;
    
    public function __construct($season)
    {
        $this->season = $season;
    }
    
    public function load($day)
    {
        $html = <<< HTML
<div id="tableaux_rencontres">
    <div>
    </table>
                        <h4>Vendredi 12 avril 2013</h4>
                        <table>
                            <caption>Liste des rencontres du vendredi 12 avril 2013</caption>
                            <thead>
                                <tr>
                                    <th scope="col">HORAIRE</th>
                                    <th scope="col">Club domicile</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Stats / Résultats</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Club extérieur</th>
                                    <th scope="col">Diffusion</th>
                                </tr>
                            </thead>
             	          <tr class="odd" >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76239" >20:30</a>        </td>
                <td class="domicile">
                    <a href="/club/valenciennes-fc">
                      Valenciennes FC                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/valenciennes-fc">
                      <img src="/images/photos/clubs/logo/moyen/500250.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76239" >0 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/as-saint-etienne">
                      <img src="/images/photos/clubs/logo/moyen/500225.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/as-saint-etienne">
                      AS Saint-Etienne                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76239#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    </table>
                        <h4>Samedi 13 avril 2013</h4>
                        <table>
                            <caption>Liste des rencontres du samedi 13 avril 2013</caption>
                            <thead>
                                <tr>
                                    <th scope="col">HORAIRE</th>
                                    <th scope="col">Club domicile</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Stats / Résultats</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Club extérieur</th>
                                    <th scope="col">Diffusion</th>
                                </tr>
                            </thead>
             	          <tr  >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76238" >17:00</a>        </td>
                <td class="domicile">
                    <a href="/club/estac-troyes">
                      ESTAC Troyes                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/estac-troyes">
                      <img src="/images/photos/clubs/logo/moyen/500073.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76238" >0 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/paris-saint-germain">
                      <img src="/images/photos/clubs/logo/moyen/500247.png" width="18" height="18" alt="Logo Paris Saint-Germain" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/paris-saint-germain">
                      Paris Saint-Germain                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76238#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr class="odd" >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76230" >20:00</a>        </td>
                <td class="domicile">
                    <a href="/club/ac-ajaccio">
                      AC Ajaccio                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/ac-ajaccio">
                      <img src="/images/photos/clubs/logo/moyen/500765.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76230" >1 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/as-nancy-lorraine">
                      <img src="/images/photos/clubs/logo/moyen/500302.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/as-nancy-lorraine">
                      AS Nancy-Lorraine                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76230#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr  >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76231" >20:00</a>        </td>
                <td class="domicile">
                    <a href="/club/girondins-de-bordeaux">
                      Girondins de Bordeaux                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/girondins-de-bordeaux">
                      <img src="/images/photos/clubs/logo/moyen/500211.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76231" >4 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/montpellier-herault-sc">
                      <img src="/images/photos/clubs/logo/moyen/500099.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/montpellier-herault-sc">
                      Montpellier Hérault SC                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76231#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr class="odd" >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76232" >20:00</a>        </td>
                <td class="domicile">
                    <a href="/club/stade-brestois-29">
                      Stade Brestois 29                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/stade-brestois-29">
                      <img src="/images/photos/clubs/logo/moyen/500024.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76232" >0 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/stade-de-reims">
                      <img src="/images/photos/clubs/logo/moyen/542397.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/stade-de-reims">
                      Stade de Reims                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76232#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr  >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76233" >20:00</a>        </td>
                <td class="domicile">
                    <a href="/club/evian-tg-fc">
                      Evian TG FC                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/evian-tg-fc">
                      <img src="/images/photos/clubs/logo/moyen/553251.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76233" >4 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/stade-rennais-fc">
                      <img src="/images/photos/clubs/logo/moyen/500015.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/stade-rennais-fc">
                      Stade Rennais FC                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76233#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr class="odd" >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76235" >20:00</a>        </td>
                <td class="domicile">
                    <a href="/club/fc-lorient">
                      FC Lorient                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/fc-lorient">
                      <img src="/images/photos/clubs/logo/moyen/501913.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76235" >4 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/sc-bastia">
                      <img src="/images/photos/clubs/logo/moyen/508009.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/sc-bastia">
                      SC Bastia                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76235#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    </table>
                        <h4>Dimanche 14 avril 2013</h4>
                        <table>
                            <caption>Liste des rencontres du dimanche 14 avril 2013</caption>
                            <thead>
                                <tr>
                                    <th scope="col">HORAIRE</th>
                                    <th scope="col">Club domicile</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Stats / Résultats</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Club extérieur</th>
                                    <th scope="col">Diffusion</th>
                                </tr>
                            </thead>
             	          <tr  >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76237" >14:00</a>        </td>
                <td class="domicile">
                    <a href="/club/ogc-nice">
                      OGC Nice                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/ogc-nice">
                      <img src="/images/photos/clubs/logo/moyen/500208.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76237" >3 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/fc-sochaux-montbeliard">
                      <img src="/images/photos/clubs/logo/moyen/500303.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/fc-sochaux-montbeliard">
                      FC Sochaux-Montbéliard                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76237#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr class="odd" >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76236" >17:00</a>        </td>
                <td class="domicile">
                    <a href="/club/olympique-lyonnais">
                      Olympique Lyonnais                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/olympique-lyonnais">
                      <img src="/images/photos/clubs/logo/moyen/500080.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76236" >3 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/toulouse-fc">
                      <img src="/images/photos/clubs/logo/moyen/524391.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/toulouse-fc">
                      Toulouse FC                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76236#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
    	          <tr  >
  
    
          <td class='horaire '><a href="/ligue1/feuille_match/76234" >21:00</a>        </td>
                <td class="domicile">
                    <a href="/club/losc-lille">
                      LOSC Lille                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/losc-lille">
                      <img src="/images/photos/clubs/logo/moyen/500054.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href="/ligue1/feuille_match/76234" >0 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/olympique-de-marseille">
                      <img src="/images/photos/clubs/logo/moyen/500083.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/olympique-de-marseille">
                      Olympique de Marseille                    </a>
                  </td>
        <td class="video">
          <a href="/ligue1/feuille_match/76234#bloc_videoMatch" >                <img src="/images/video_ligue1.png" width="24" height="24" alt="Résumé vidéo" />
                </a>        </td>
              </tr>
           </table>
    
  </div>
</div>
HTML;
        return $html;
    }
    
    public function loadMatch($matchId)
    {
        $method = sprintf('match%d', $matchId);
    
        return $this->$method();
    }
    
    private function match76239()
    {
        return <<< HTML
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <!--  wplfpp01s/2013-04-28 03:05:18 -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Language" content="fr" />
<meta http-equiv="Cache-Control" content="public" />
    <meta name="title" content="LFP.fr - Ligue de Football Professionnel - Ligue 1 - Saison 2012/2013 - 32ème journée - Valenciennes FC / AS Saint-Etienne" />
<meta name="keywords" content="Ligue 1, Ligue 2, live,  match, om, psg, ol, score en direct, composition officielle, buteurs" />
<meta name="description" content="Site Officiel de la Ligue de Football Professionnel - Feuille de match officielle - 2012/2013 - 32ème journée - Valenciennes FC / AS Saint-Etienne" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@LFPfr" />
<meta name="twitter:title" content="Ligue 1 - Saison 2012/2013 - Valenciennes FC / AS Saint-Etienne" />
<meta name="twitter:description" content="Feuille de match officielle de la rencontre Valenciennes FC / AS Saint-Etienne - Saison 2012/2013 - 32ème journée - Hashtag : #VAFCASSE" />
<meta name="twitter:image" content="http://www.lfp.fr/images/photos/competitions/D1.jpg" />
<meta name="twitter:url" content="http://www.lfp.fr/ligue1/feuille_match/76239" />
<meta name="identifier-url" content="http://www.lfp.fr" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow" />
      <meta property="twitter:account_id" content="392583495" />
        <title>LFP.fr - Ligue de Football Professionnel - Ligue 1 - Saison 2012/2013 - 32ème journée - Valenciennes FC / AS Saint-Etienne</title>
        <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="LFP.fr - Toute l'actualité officielle" href="http://www.lfp.fr/rss/index.xml" />
    <link rel="alternate" type="application/rss+xml" title="LFP.fr - Ligue 1" href="http://www.lfp.fr/ligue1/rss.xml" />
    <link rel="alternate" type="application/rss+xml" title="LFP.fr - Ligue 2" href="http://www.lfp.fr/ligue2/rss.xml" />
    <link rel="alternate" type="application/rss+xml" title="LFP.fr - Coupe de la Ligue" href="http://www.lfp.fr/coupeLigue/rss.xml" />
    <link rel="alternate" type="application/rss+xml" title="LFP.fr - La Ligue en Action" href="http://www.lfp.fr/corporate/rss.xml" />
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
    
          <link rel="stylesheet" type="text/css" media="all" href="/css/styles.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/clubs.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/stats.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/awl.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/match.css" />
<link rel="stylesheet" type="text/css" media="print" href="/css/print.css" />
<!--[if lte IE 8]><link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css" /><![endif]-->
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" media="screen" href="/css/ie6.css" /><![endif]-->
<!--[if lte IE 7]><link rel="stylesheet" type="text/css" media="screen" href="/css/onglets_fix.css" /><![endif]-->
    <link href="/css/l1.css" media="all" type="text/css" rel="stylesheet" />
           <script type="text/javascript" src="/js/jquery-1.4.4.min.js" ></script>
       <script type="text/javascript" src="/js/functions.min.js" ></script>        <script type='text/javascript'>var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-2477465-1']);
          _gaq.push(['_trackPageview']);
    
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();</script>  </head>
  <body class="l1">
	<div id="wrap">
        <div id="header">
	<div id="head">
		<a href="/" id="accueil" class="lfpfr"><span>LFP.FR</span></a>
		<ul>
			<li id="l1"><a href="/ligue1"><span>Ligue 1</span></a></li>
			<li id="l2"><a href="/ligue2"><span>Ligue 2</span></a></li>
			<li id="cl"><a href="/coupeLigue"><span>Coupe de la ligue</span></a></li>
			<li id="trophee"><a href="/tropheeChampions"><span>Trophée des champions</span></a></li>
			<li id="autres"><a href="/autresCompetitions"><span>Autres compétitions</span></a></li>
	  	</ul>
                <ul>
                    <li id="video"><a href="/video"><span>Vidéos</span></a></li>
                    <li id="lfpStats"><a href="/LFPStats"><span>LFP Stats</span></a></li>
                </ul>
		<ul>
			<li id="corpo"><a href="/corporate"><span>La LFP en action</span></a></li>
			<li id="media"><a href="/media"><span>Espace média</span></a></li>
		</ul>
		<!--<form action="/recherche/resultat.html" id="form_rechercher" method="post">
			<label for="rechercher">Rechercher</label>
			<div class="input"><input type="text" id="rechercher" name="query" value="Rechercher" /></div>
			<input type="image" src="/images/bt_ok.png" alt="Lancer la recherche" />
		</form>-->
		<div id="langues" class="open">
			<a href="#" class="selected">FR</a>
			<ul class="liste_langues">
				<li lang="en"><a href="http://www.ligue1.com/" title="View English version">EN</a></li>
                                <li lang="cn"><a href="http://www.ligue1.cn/" title="View Chinese version">中文</a></li>
			</ul>
		</div>
	  </div>
</div>		<div id="container">
			<div id="top">
							  		<ul id="clubs_l1" class="logos_clubs">
    <li><a href="/club/ac-ajaccio" class="logo_500765"><span>AC Ajaccio</span></a></li><li><a href="/club/sc-bastia" class="logo_508009"><span>SC Bastia</span></a></li><li><a href="/club/girondins-de-bordeaux" class="logo_500211"><span>Girondins de Bordeaux</span></a></li><li><a href="/club/stade-brestois-29" class="logo_500024"><span>Stade Brestois 29</span></a></li><li><a href="/club/evian-tg-fc" class="logo_553251"><span>Evian TG FC</span></a></li><li><a href="/club/losc-lille" class="logo_500054"><span>LOSC Lille</span></a></li><li><a href="/club/fc-lorient" class="logo_501913"><span>FC Lorient</span></a></li><li><a href="/club/olympique-lyonnais" class="logo_500080"><span>Olympique Lyonnais</span></a></li><li><a href="/club/olympique-de-marseille" class="logo_500083"><span>Olympique de Marseille</span></a></li><li><a href="/club/montpellier-herault-sc" class="logo_500099"><span>Montpellier Hérault SC</span></a></li><li><a href="/club/as-nancy-lorraine" class="logo_500302"><span>AS Nancy-Lorraine</span></a></li><li><a href="/club/ogc-nice" class="logo_500208"><span>OGC Nice</span></a></li><li><a href="/club/paris-saint-germain" class="logo_500247"><span>Paris Saint-Germain</span></a></li><li><a href="/club/stade-de-reims" class="logo_542397"><span>Stade de Reims</span></a></li><li><a href="/club/stade-rennais-fc" class="logo_500015"><span>Stade Rennais FC</span></a></li><li><a href="/club/as-saint-etienne" class="logo_500225"><span>AS Saint-Etienne</span></a></li><li><a href="/club/fc-sochaux-montbeliard" class="logo_500303"><span>FC Sochaux-Montbéliard</span></a></li><li><a href="/club/toulouse-fc" class="logo_524391"><span>Toulouse FC</span></a></li><li><a href="/club/estac-troyes" class="logo_500073"><span>ESTAC Troyes</span></a></li><li><a href="/club/valenciennes-fc" class="logo_500250"><span>Valenciennes FC</span></a></li></ul>
			  				</div>
			<div id="page">
          			                                    <div id="matchs_live">
        <div class="scroll_matchs">
            <h1 class="hide">Matchs en direct</h1>
                                    <div class="heure D1">14:00</div>
                                           <div class="match">
    
                            <div class="equipes"><a href="/ligue1/feuille_match/76257?live=1">Olympique Lyonnais</a><br /><a href="/ligue1/feuille_match/76257?live=1">AS Saint-Etienne</a></div>
                            <div class="infos_match">
                                                            </div>
                        </div>
                                                <div class="heure D1">17:00</div>
                                           <div class="match">
    
                            <div class="equipes"><a href="/ligue1/feuille_match/76258?live=1">OGC Nice</a><br /><a href="/ligue1/feuille_match/76258?live=1">ESTAC Troyes</a></div>
                            <div class="infos_match">
                                                            </div>
                        </div>
                                                <div class="heure D1">21:00</div>
                                           <div class="match">
    
                            <div class="equipes"><a href="/ligue1/feuille_match/76254?live=1">Evian TG FC</a><br /><a href="/ligue1/feuille_match/76254?live=1">Paris Saint-Germain</a></div>
                            <div class="infos_match">
                                                            </div>
                        </div>
                                </div>
    </div>
    
                                                                                                        <div id="sidebar">
                                                <div class="nav_pages">
                                                    <div id="nav_pages">
                                                         <ul>
    <li><a href="/ligue1">Actualités</a></li>
    <li><a href="/ligue1/calendrier_resultat">Calendrier / Résultats</a></li>
    <li><a href="/ligue1/programmationTV/diffusions">Programme TV</a>        <div class="nav_pages_second">
            <ul>
                <li><a href="/ligue1/programmationTV/diffusions">Prochaines diffusions</a></li>
                <li><a href="/ligue1/programmationTV/statistiques">Statistiques</a></li>
            </ul>
        </div>
    </li>
    <li>
        <a href="/ligue1/classement">Classements</a>        <div class="nav_pages_second">
            <ul>
                <li><a href="/ligue1/classement?cat=Gen">Général</a></li>
                <li><a href="/ligue1/classement?cat=Dom">Domicile</a></li>
                <li><a href="/ligue1/classement?cat=Ext">Extérieur</a></li>
                <li><a href="/ligue1/classement?cat=Att">Attaque</a></li>
                <li><a href="/ligue1/classement?cat=Def">Défense</a></li>
                <li><a href="/ligue1/classement?cat=1mt">1ère période</a></li>
                <li><a href="/ligue1/classement?cat=2mt">2ème période</a></li>
                <li><a href="/ligue1/classement?cat=Fpl">Fair-Play</a></li>
            </ul>
        </div>
    </li>
    <li><a href="/ligue1/classementButeurs">Classement des buteurs</a></li>
    <li><a href="/ligue1/classementPasseurs">Classement des passeurs</a></li>
    <li><a href="/ligue1/affluences/journee">Affluences</a>        <div class="nav_pages_second">
            <ul>
                <li><a href="/ligue1/affluences/journee">Par journée</a></li>
                <li><a href="/ligue1/affluences/club">Par club</a></li>
                <li><a href="/ligue1/affluences/remplissage">Taux de remplissage</a></li>
            </ul>
        </div>
    </li>
    <li><a href="/LFPStats/stats_home?competition=D1">Statistiques</a>
      <div class="nav_pages_second">
         <ul>
            <li><a href="/LFPStats/stats_but?competition=D1">Buts</a></li>
            <li><a href="/LFPStats/stats_passe?competition=D1">Passes décisives</a></li>
            <li><a href="/LFPStats/stats_carton?competition=D1">Cartons</a></li>
            <li><a href="/LFPStats/stats_confrontation?competition=D1">Confrontations</a></li>
            <li><a href="/LFPStats/stats_score?competition=D1">Scores</a></li>
            <li><a href="/LFPStats/stats_joueur?competition=D1">Joueurs</a></li>
            <li><a href="/LFPStats/stats_arbitre?competition=D1">Arbitres</a></li>
            <li><a href="/LFPStats/stats_possession?competition=D1">Possession</a></li>
            <li><a href="/LFPStats/stats_tir?competition=D1">Tirs</a></li>
            <li><a href="/LFPStats/stats_ballon?competition=D1">Ballons joués</a></li>
            <li><a href="/LFPStats/stats_centre?competition=D1">Centres</a></li>
            <li><a href="/LFPStats/stats_record?competition=D1">Records</a></li>
         </ul>
        </div>
    </li>
    
    <li><a href="/ligue1/transferts/hiver">Transferts</a></li>
  <!--  <li><a href="/ligue1/matchesAmicaux">Matchs amicaux</a></li>-->
    <li><a href="/ligue1/championnatFranceTribunes">Championnat des Tribunes</a></li>
    <li><a href="/ligue1/palmares">Palmarès</a></li>
    
    
<li>
        <a href="/ligue1/calendrier_resultat?sai=80">Historique</a>        <div class="nav_pages_second">
            <ul>
                <li><a href="/ligue1/calendrier_resultat?sai=80">Résultats</a></li>
                <li><a href="/ligue1/classement?saison=80">Classement</a></li>
                <li><a href="/ligue1/classementButeurs?saison=80">Buteurs</a></li>
                <li><a href="/ligue1/classementPasseurs?saison=80">Passeurs</a></li>
            </ul>
        </div>
    </li>
    <li><a href="/ligue1/bilanClubs">Bilan des clubs</a></li>
    <li><a href="/ligue1/commentVoirLaLigue1">Comment voir la Ligue 1 ?</a></li>
    
   <li><a href="http://www.fantasylfp.fr/" target="_blank">Parions Web Fantasy LFP</a></li>
</ul>                                                    </div>
                                                </div>
                                                <div class="box">
<div class="box_top2"></div>
<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FLigue1&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23FFFFFF&amp;stream=false&amp;header=false&amp;height=182&amp;appId=301713429843893" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:182px;" allowTransparency="true"></iframe>
<div class="box_bottom2"></div>
</div>                                                        <div class="box">
                                                            <div class="box_top2"></div>
                                                            <div class="rencontres">
    <h2 class="titre_bg_1">Rencontres / Programmations</h2>
    <div class="nav" id="nav_ligue1">
          <a href="javascript:void(changeCalendrierHomeJournee('ligue1',31,76232));" class="nav_left" name="journee_prev" title="31ème journée"><span>31ème journée</span></a>
      <h3 class="live">32ème journée</h3>
      <input type="hidden" value="0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38"/>
      <input type="hidden" name="0" value="Journée 0"/>
<input type="hidden" name="1" value="1ère journée"/>
<input type="hidden" name="2" value="2ème journée"/>
<input type="hidden" name="3" value="3ème journée"/>
<input type="hidden" name="4" value="4ème journée"/>
<input type="hidden" name="5" value="5ème journée"/>
<input type="hidden" name="6" value="6ème journée"/>
<input type="hidden" name="7" value="7ème journée"/>
<input type="hidden" name="8" value="8ème journée"/>
<input type="hidden" name="9" value="9ème journée"/>
<input type="hidden" name="10" value="10ème journée"/>
<input type="hidden" name="11" value="11ème journée"/>
<input type="hidden" name="12" value="12ème journée"/>
<input type="hidden" name="13" value="13ème journée"/>
<input type="hidden" name="14" value="14ème journée"/>
<input type="hidden" name="15" value="15ème journée"/>
<input type="hidden" name="16" value="16ème journée"/>
<input type="hidden" name="17" value="17ème journée"/>
<input type="hidden" name="18" value="18ème journée"/>
<input type="hidden" name="19" value="19ème journée"/>
<input type="hidden" name="20" value="20ème journée"/>
<input type="hidden" name="21" value="21ème journée"/>
<input type="hidden" name="22" value="22ème journée"/>
<input type="hidden" name="23" value="23ème journée"/>
<input type="hidden" name="24" value="24ème journée"/>
<input type="hidden" name="25" value="25ème journée"/>
<input type="hidden" name="26" value="26ème journée"/>
<input type="hidden" name="27" value="27ème journée"/>
<input type="hidden" name="28" value="28ème journée"/>
<input type="hidden" name="29" value="29ème journée"/>
<input type="hidden" name="30" value="30ème journée"/>
<input type="hidden" name="31" value="31ème journée"/>
<input type="hidden" name="32" value="32ème journée"/>
<input type="hidden" name="33" value="33ème journée"/>
<input type="hidden" name="34" value="34ème journée"/>
<input type="hidden" name="35" value="35ème journée"/>
<input type="hidden" name="36" value="36ème journée"/>
<input type="hidden" name="37" value="37ème journée"/>
<input type="hidden" name="38" value="38ème journée"/>
      <a href="javascript:void(changeCalendrierHomeJournee('ligue1',33,76232));" class="nav_right" name="journee_next" title="33ème journée"><span>33ème journée</span></a>
      <div class="clear"></div>
    </div>
		<div id="calendrier_home_ligue1_load" class="load"></div>
	<div id="calendrier_home_ligue1">
	 
<input type="hidden" value="32" name="id_journee_courante" />
<div id="tableaux_rencontres_ligue1">
  <div>
        <h4>Vendredi 12 avril 2013</h4>
    <table>
      <caption>Liste des rencontres du vendredi 12 avril 2013</caption>
      <thead>
        <tr>
          <th scope="col">HORAIRE</th>
          <th scope="col">Club domicile</th>
          <th scope="col">Logo</th>
          <th scope="col">Stats / Résultats</th>
          <th scope="col">Logo</th>
          <th scope="col">Club extérieur</th>
          <th scope="col">Diffusion</th>
        </tr>
      </thead>
                  <tr class="odd" >
        	<td class='horaire'><a href="/ligue1/feuille_match/76239">20:30</a></td>                <td class="domicile">
                    <a href="/club/valenciennes-fc">
                      Valenciennes FC                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/valenciennes-fc">
                      <img src="/images/photos/clubs/logo/petit/500250.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76239'>0 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/as-saint-etienne">
                      <img src="/images/photos/clubs/logo/petit/500225.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/as-saint-etienne">
                      AS Saint-Etienne                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 3        </td>
      </tr>
    </table>    <h4>Samedi 13 avril 2013</h4>
    <table>
      <caption>Liste des rencontres du samedi 13 avril 2013</caption>
      <thead>
        <tr>
          <th scope="col">HORAIRE</th>
          <th scope="col">Club domicile</th>
          <th scope="col">Logo</th>
          <th scope="col">Stats / Résultats</th>
          <th scope="col">Logo</th>
          <th scope="col">Club extérieur</th>
          <th scope="col">Diffusion</th>
        </tr>
      </thead>
                  <tr  >
        	<td class='horaire'><a href="/ligue1/feuille_match/76238">17:00</a></td>                <td class="domicile">
                    <a href="/club/estac-troyes">
                      ESTAC Troyes                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/estac-troyes">
                      <img src="/images/photos/clubs/logo/petit/500073.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76238'>0 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/paris-saint-germain">
                      <img src="/images/photos/clubs/logo/petit/500247.png" width="18" height="18" alt="Logo Paris Saint-Germain" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/paris-saint-germain">
                      Paris Saint-Germain                    </a>
                  </td>
        <td class="diffusion">
        Canal +        </td>
      </tr>
                <tr class="odd" >
        	<td class='horaire'><a href="/ligue1/feuille_match/76230">20:00</a></td>                <td class="domicile">
                    <a href="/club/ac-ajaccio">
                      AC Ajaccio                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/ac-ajaccio">
                      <img src="/images/photos/clubs/logo/petit/500765.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76230'>1 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/as-nancy-lorraine">
                      <img src="/images/photos/clubs/logo/petit/500302.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/as-nancy-lorraine">
                      AS Nancy-Lorraine                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 3        </td>
      </tr>
                <tr  >
        	<td class='horaire'><a href="/ligue1/feuille_match/76231">20:00</a></td>                <td class="domicile">
                    <a href="/club/girondins-de-bordeaux">
                      Girondins de Bordeaux                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/girondins-de-bordeaux">
                      <img src="/images/photos/clubs/logo/petit/500211.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76231'>4 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/montpellier-herault-sc">
                      <img src="/images/photos/clubs/logo/petit/500099.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/montpellier-herault-sc">
                      Montpellier Hérault SC                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 7        </td>
      </tr>
                <tr class="odd" >
        	<td class='horaire'><a href="/ligue1/feuille_match/76232">20:00</a></td>                <td class="domicile">
                    <a href="/club/stade-brestois-29">
                      Stade Brestois 29                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/stade-brestois-29">
                      <img src="/images/photos/clubs/logo/petit/500024.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76232'>0 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/stade-de-reims">
                      <img src="/images/photos/clubs/logo/petit/542397.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/stade-de-reims">
                      Stade de Reims                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 4        </td>
      </tr>
                <tr  >
        	<td class='horaire'><a href="/ligue1/feuille_match/76233">20:00</a></td>                <td class="domicile">
                    <a href="/club/evian-tg-fc">
                      Evian TG FC                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/evian-tg-fc">
                      <img src="/images/photos/clubs/logo/petit/553251.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76233'>4 - 2</a>        </td>
                <td class="logo">
                    <a href="/club/stade-rennais-fc">
                      <img src="/images/photos/clubs/logo/petit/500015.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/stade-rennais-fc">
                      Stade Rennais FC                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 5        </td>
      </tr>
                <tr class="odd" >
        	<td class='horaire'><a href="/ligue1/feuille_match/76235">20:00</a></td>                <td class="domicile">
                    <a href="/club/fc-lorient">
                      FC Lorient                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/fc-lorient">
                      <img src="/images/photos/clubs/logo/petit/501913.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76235'>4 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/sc-bastia">
                      <img src="/images/photos/clubs/logo/petit/508009.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/sc-bastia">
                      SC Bastia                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1<br />beIN SPORT MAX 6        </td>
      </tr>
    </table>    <h4>Dimanche 14 avril 2013</h4>
    <table>
      <caption>Liste des rencontres du dimanche 14 avril 2013</caption>
      <thead>
        <tr>
          <th scope="col">HORAIRE</th>
          <th scope="col">Club domicile</th>
          <th scope="col">Logo</th>
          <th scope="col">Stats / Résultats</th>
          <th scope="col">Logo</th>
          <th scope="col">Club extérieur</th>
          <th scope="col">Diffusion</th>
        </tr>
      </thead>
                  <tr  >
        	<td class='horaire'><a href="/ligue1/feuille_match/76237">14:00</a></td>                <td class="domicile">
                    <a href="/club/ogc-nice">
                      OGC Nice                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/ogc-nice">
                      <img src="/images/photos/clubs/logo/petit/500208.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76237'>3 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/fc-sochaux-montbeliard">
                      <img src="/images/photos/clubs/logo/petit/500303.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/fc-sochaux-montbeliard">
                      FC Sochaux-Montbéliard                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1        </td>
      </tr>
                <tr class="odd" >
        	<td class='horaire'><a href="/ligue1/feuille_match/76236">17:00</a></td>                <td class="domicile">
                    <a href="/club/olympique-lyonnais">
                      Olympique Lyonnais                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/olympique-lyonnais">
                      <img src="/images/photos/clubs/logo/petit/500080.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76236'>3 - 1</a>        </td>
                <td class="logo">
                    <a href="/club/toulouse-fc">
                      <img src="/images/photos/clubs/logo/petit/524391.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/toulouse-fc">
                      Toulouse FC                    </a>
                  </td>
        <td class="diffusion">
        beIN SPORT 1        </td>
      </tr>
                <tr  >
        	<td class='horaire'><a href="/ligue1/feuille_match/76234">21:00</a></td>                <td class="domicile">
                    <a href="/club/losc-lille">
                      LOSC Lille                    </a>
                  </td>
        <td class="logo">
                    <a href="/club/losc-lille">
                      <img src="/images/photos/clubs/logo/petit/500054.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="stats">
          <a href='/ligue1/feuille_match/76234'>0 - 0</a>        </td>
                <td class="logo">
                    <a href="/club/olympique-de-marseille">
                      <img src="/images/photos/clubs/logo/petit/500083.png" width="18" height="18" alt="" />
                    </a>
                  </td>
        <td class="exterieur">
                    <a href="/club/olympique-de-marseille">
                      Olympique de Marseille                    </a>
                  </td>
        <td class="diffusion">
        Canal +<br />beIN SPORT 1        </td>
      </tr>
    
    
 </table>
    
  </div>
</div>
	</div>
    
<!--
  <p><a href="/ligue1/calendrier_resultat">Voir le programme complet</a></p>-->
    
    
<!--
<div style="width: 335px;margin: 0 auto; text-align:center;padding-top: 10px;">
<a href="https://twitter.com/intent/tweet?button_hashtag=cdl&text=Finale%20Coupe%20de%20la%20Ligue%202012" class="twitter-hashtag-button" data-lang="en" data-related="jasoncosta">Tweet #cdl</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>-->
 </div>
                                                            <div class="box_bottom2"></div>
                                                        </div>
    
                            
                                                        <div class="box">
<div class="box_top2"></div>
<script>
numimage = Math.round( Math.random() * ( 2 - 1 ) + 1 );if (numimage == 1)
document.write ('<a href="http://ad.zanox.com/ppc/?15314296C1971476403T" target="_blank"><img src="http://ad.zanox.com/ppv/?15314296C1971476403" align="bottom" width="300" height="250" border="0" hspace="1" alt="1. Bonus Foot - 300-250"></a>');
if (numimage == 2)
document.write ('<a href="http://www.fantasylfp.fr" target="_blank"><img src="/images/pub/300_250_PARIONSWEB_V2.jpg" align="bottom" width="300" height="250" border="0" hspace="1" alt="Fantasy LFP"></a>');
</script>
<div class="box_bottom2"></div>
</div>
                                        </div>
                                 		  						<div id="contenus">
			          	<div class="box match_stats">
	  <div class="box_top"></div>
	  <div class="contenu_box match_stats">
		<h1 class="confrontation">Feuille de match <span>Valenciennes FC - AS Saint-Etienne</span></h1>
	    <p>Saison 2012/2013 - <a href="/ligue1/calendrier_resultat?sai=81&jtr=32">32ème journée</a></p>
		<p>Vendredi 12 avril 2013 - Stade du Hainaut</p>
	    <p>
	    	    	16 004 spectateurs
    
	    /	    	    	11°</p>
	   
		<script type="text/javascript">
    $(document).ready(function(){
                chargeOngletsFeuilleMatch(["statsMatch","statsJoueursMatch", "videoMatch",]);
         });
</script>
<input type="hidden" id="match_id_hidden" value="76239"/>
<input type="hidden" id="dom_id_hidden" value="281"/>
<input type="hidden" id="ext_id_hidden" value="235"/>
<input type="hidden" id="live_hidden" value="0"/>
<input type="hidden" id="dom_nom_club_hidden" value="Valenciennes+FC"/>
<input type="hidden" id="ext_nom_club_hidden" value="AS+Saint-Etienne"/>
    
<div class="score">
    <div style="background-image: url(/images/photos/clubs/logo/grand/500250.png);background-size:80px 80px;" class="club_dom">
        <span class="club">Valenciennes FC</span>
                	<span class="buts">0</span>
	 
    </div>
    <div style="background-image: url(/images/photos/clubs/logo/grand/500225.png);background-size:80px 80px;" class="club_ext">
        <span class="club ">AS Saint-Etienne</span>
				<span class="buts">0</span>
    
    </div>
    <div class="video"><span class="icon icon_video"></span><a href="#?w=630" rel="popup_76239" class="poplight" onClick="document.getElementById('player_76239').src='http://www.youtube.com/embed/WNr_LY_YLQI?theme=light&color=white&showinfo=0'" title="Retrouvez le résumé vidéo officiel de la rencontre">Résumé vidéo</a></div>
<div id="popup_76239" class="popup_block">
<div class="titrePopUpVideo">
<img src="/images/photos/clubs/logo/petit/500250.png" height="18" width="18" /> Valenciennes FC - <img src="/images/photos/clubs/logo/petit/500225.png" height="18" width="18" />
AS Saint-Etienne (0 - 0)
</div>
<div class="fermerPopUpVideo"><a class="close" href="#" rel="76239">Fermer</a></div>
<p id="videoPopUp"><iframe id="player_76239" frameborder="0" width="630" height="353" src="http://www.youtube.com/embed/WNr_LY_YLQI?theme=light&color=white&showinfo=0"></iframe></p>
</div>
    
    
    <div class="clear"></div>
  
<p class="periode">
			(0-0)
	            </p>
    
    
           <div class="clear"></div>
    <div style="text-align:center;padding:10px;">
        <a href="https://twitter.com/intent/tweet?button_hashtag=VAFCASSE" class="twitter-hashtag-button" data-lang="fr" data-size="large">Tweet #VAFCASSE</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    <div class="clear"></div>
    
    <!-- Tirs au buts -->
    	    
    <!-- BUTS -->
    <br/>
    <div id="buts">
        <ul class="club_dom">
                    </ul>
        <ul class="club_ext">
    
        </ul>
    </div>
    
    	
   	<!-- CARTONS -->
    <div id="cartons">
        <ul class="club_dom clear">
           
        </ul>
        <ul class="club_ext">
    
	              		            <li><span class="icon icon_carton_jaune">Carton jaune</span>                   45'  +1 :
	            								<a href="/joueur/hamouma-romain-1">Romain HAMOUMA</a>
							         </li>
    
	              		            <li><span class="icon icon_carton_jaune">Carton jaune</span>                   68'  :
	            								<a href="/joueur/aubameyang-pierre-emerick">Pierre-Emerick AUBAMEYANG</a>
							         </li>
    
	              		            <li><span class="icon icon_carton_jaune">Carton jaune</span>                   80'  :
	            								<a href="/joueur/lemoine-fabien">Fabien LEMOINE</a>
							         </li>
	                </ul>
    </div>
    <div class="clear"></div>
    </div>
    
    <div class="details">
        <div class="onglets clear" id="onglets_infos" style="position: relative;">
     <ul class="nav_onglets">
    <li id="onglet_infos" class="on"><a href="#bloc_infos"><span class="lien">Infos match</span><span class="fin"></span></a></li>
        <li id="onglet_statistiques" class=""><a href="#bloc_statistiques"><span class="lien">Statistiques</span><span class="fin"></span></a></li>
    <li id="onglet_statistiquesJoueurs" class=""><a href="#bloc_statistiquesJoueurs"><span class="lien">Statistiques joueurs</span><span class="fin"></span></a></li>
          <li id="onglet_videoMatch" class=""><a href="#bloc_videoMatch"><span class="lien">Résumé vidéo</span><span class="fin"></span></a></li>
          </ul>
    <div id="bloc_infos" class="onglets_infos" style="display: block;">
    <div id="bloc_infosMatch_load" class="load"></div>
    <div id="bloc_infosMatch_data"></div>
    </div>
                               <!--  <ul class="nav_onglets">
                    <li id="onglet_infos" class="on compos_coup_envoi"><a href="#bloc_infos"><span class="lien">Composition des équipes au coup d'envoi</span><span class="fin"></span></a></li>
                    </ul>-->
    
    
               <!--       <ul class="nav_onglets">
                    <li id="onglet_infos" class="on"><a href="#bloc_infos"><span class="lien">Infos match</span><span class="fin"></span></a></li>
                    <li id="onglet_resume_video" class=""><a href="#bloc_resume_video"><span class="lien">Résumé vidéo</span><span class="fin"></span></a></li>
                    </ul>-->
              
			<script type="text/javascript">
				var matchId = $('#match_id_hidden').val();
				var domId = $('#dom_id_hidden').val();
				var extId = $('#ext_id_hidden').val();
				var live = $('#live_hidden').val();
				var domNomClub = $('#dom_nom_club_hidden').val();
				var extNomClub = $('#ext_nom_club_hidden').val();
				$('#bloc_infosMatch_load').fadeIn("fast", function(){
				  $('#bloc_infosMatch_data').load('showInfosMatch?matchId='+matchId+'&domId='+domId+'&extId='+extId+'&live='+live+'&domNomClub='+domNomClub+'&extNomClub='+extNomClub, function(){
                                       $('#bloc_infosMatch_load').fadeOut("fast");
				      $('#bloc_infosMatch_data').fadeTo("fast", 1);
				  });
				});
			</script>
    
    <div id="bloc_statistiques" class="onglets_infos" style="display: none;">
    	<div id="bloc_statsMatch_load" class="load"></div>
    	<div id="bloc_statsMatch_data"></div>
    </div>
				
    <div id="bloc_statistiquesJoueurs" class="onglets_infos" style="display: none;">
        <div id="bloc_statsJoueursMatch_load" class="load"></div>
    	<div id="bloc_statsJoueursMatch_data"></div>
    </div>
    
   <div id="bloc_videoMatch" class="onglets_infos" style="display: none;">
        <div id="bloc_videoMatch_load" class="load"></div>
    	<div id="bloc_videoMatch_data"></div>
    </div>
    
    
    </div>
</div>
    
	  </div>
    
	  <div class="box_bottom"></div>
	</div>
    
                                                                               <div class="box" id="partenaires">
                                            <div class="box_top"></div>
                                            <ul class="partenaires">
    <li><img src="/images/pub1_l1.png" alt="Diffuseurs officiels" border="0" usemap="#MapL1" width="428" height="65"/>
      <map name="MapL1" id="MapL1">
       <area shape="rect" coords="152,20,233,53" href="http://www.beinsport.fr/" alt="beIN SPORT" target="_blank" alt="BeIn Sport" />
        <area shape="rect" coords="47,20,128,53" href="http://www.canalplus.fr/"  alt="Canal +"  target="_blank" alt="Canal Plus" />
        <area shape="rect" coords="272,11,323,60" href="http://sites.orange.fr/shop/forfaits_mobiles/options/fiches/option_ligue1.html"  target="_blank" alt="Orange" />
      </map>
    </li>
    
    <li class="last"><a href="/ligue1/ballonOfficiel" id="lienInterne"><img src="/images/pub3.png" alt="Ballon officiel" width="220" height="65" /></a></li>
    
    
</ul>
<div class="clear"></div>
                                            <div class="box_bottom"></div>
                                        </div>
                                  				</div>
    
		  
					<div class="clear"></div>
			
			</div>
			 <ul id="fin_contenus">
    <li class="tout_moment">LFP.FR<br />&Aacute; TOUT MOMENT</li>
    <li class="mobile"><a href="/MobileLFP/">LFP SUR MOBILE / TABLETTE</a></li>
    <li class="rss"><a href="/fluxRSS/">FLUX RSS / ICAL</a></li>
    <li class="twitter"><a href="http://twitter.com/LFPfr" target="_blank">TWITTER</a></li>
    <li class="ajouter">
        <a href="#" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.lfp.fr');">Ajouter LFP commme page de démarrage</a>
        <br />
        <a href="#" onclick="javascript:addFavoris();">Ajouter LFP.fr à mes favoris</a>
    </li>
</ul>
<div id="nav_bas">
    <p><a href="#">LFP 2012</a> - LFP, Ligue 1, L1, Ligue 2, L2 et Coupe de le Ligue sont des marques déposées de la LFP.</p>
    <ul>
        <li><a href="/mentionsLegales/">Mentions légales</a></li>
        <li><a href="/recrutement/">Recrutement</a></li>
        <li><a href="/contacts/">Contacts</a></li>
    </ul>
</div>
<ul id="footer">
    <li>
        <a href="/ligue1">Ligue 1</a>
        <ul>
            <li><a href="/ligue1">Actualités</a></li>
            <li><a href="/ligue1/calendrier_resultat">Calendrier / Résultats</a></li>
            <li><a href="/ligue1/programmationTV/diffusions">Programme TV</a></li>
            <li><a href="/ligue1/classement">Classements</a></li>
            <li><a href="/ligue1/classementButeurs">Classement des buteurs</a></li>
            <li><a href="/ligue1/classementPasseurs">Classement des passeurs</a></li>
            <li><a href="/ligue1/affluences/journee">Affluences</a></li>
            <li><a href="/LFPStats/stats_home?competition=D1">Statistiques</a></li>
            <li><a href="/ligue1/transferts/hiver">Transferts</a></li>
            <!--<li><a href="/ligue1/matchesAmicaux">Matchs amicaux</a></li>-->
            <li><a href="/ligue1/championnatFranceTribunes">Championnat des Tribunes</a></li>
            <li><a href="/ligue1/palmares">Palmarès</a></li>
            <li><a href="/ligue1/bilanClubs">Bilan des clubs</a></li>
            <li><a href="/ligue1/commentVoirLaLigue1">Comment voir la Ligue 1 ?</a></li>
        </ul>
    </li>
    <li>
        <a href="/ligue2">Ligue 2</a>
        <ul>
            <li><a href="/ligue2">Actualités</a></li>
            <li><a href="/ligue2/calendrier_resultat">Calendrier / Résultats</a></li>
            <li><a href="/ligue2/programmationTV/diffusions">Programme TV</a></li>
            <li><a href="/ligue2/classement">Classements</a></li>
            <li><a href="/ligue2/classementButeurs">Classement des buteurs</a></li>
            <li><a href="/ligue2/classementPasseurs">Classement des passeurs</a></li>
            <li><a href="/ligue2/affluences/journee">Affluences</a></li>
            <li><a href="/LFPStats/stats_home?competition=D2">Statistiques</a></li>
            <li><a href="/ligue2/transferts/hiver">Transferts</a></li>
            <!--<li><a href="/ligue2/matchesAmicaux">Matchs amicaux</a></li>-->
            <li><a href="/ligue2/championnatFranceTribunes">Championnat des Tribunes</a></li>
            <li><a href="/ligue2/palmares">Palmarès</a></li>
            <li><a href="/ligue2/bilanClubs">Bilan des clubs</a></li>
            <li><a href="/ligue2/commentVoirLaLigue2">Comment voir la Ligue 2 ?</a></li>
        </ul>
    </li>
    <li>
        <a href="/coupeLigue">Coupe de la ligue</a>
        <ul>
            <li><a href="/coupeLigue">Actualités</a></li>
            <li><a href="/coupeLigue/calendrier_resultat">Calendrier / Résultats</a></li>
            <li><a href="/coupeLigue/programmationTV/diffusions">Programme TV</a></li>
            <li><a href="/coupeLigue/classementButeurs">Classement des buteurs</a></li>
            <li><a href="/coupeLigue/affluences/journee">Affluences</a></li>
            <li><a href="/LFPStats/stats_home?competition=CL">Statistiques</a></li>
            <li><a href="/coupeLigue/palmares">Palmarès</a></li>
            <li><a href="/coupeLigue/bilanClubs">Bilan des clubs</a></li>
            <li><a href="/coupeLigue/reglement">Règlement</a></li>
            <li><a href="/coupeLigue/partenaires">Partenaires</a></li>
        </ul>
    </li>
    <li>
        <a href="/autresCompetitions">Autres compétitions</a>
        <ul>
            <li><a href="/tropheeChampions">Trophée des champions</a></li>
            <li><a href="/autresCompetitions/coupeFrance/calendrier_resultat">Coupe de France</a></li>
            <li><a href="/autresCompetitions/championsLeague/calendrier_resultat">UEFA Champions's League</a></li>
            <li><a href="/autresCompetitions/europaLeague/calendrier_resultat">UEFA Europa League</a></li>
            <li><a href="/autresCompetitions/equipeFrance/calendrier_resultat">Equipe de France</a></li>
        </ul>
    </li>
    <li>
        <a href="/corporate">La Ligue en Action</a>
        <ul>
            <li><a href="/corporate/actualite.html">Actualités LFP</a></li>
            <li><a href="/corporate/agenda.html">Agendas LFP</a></li>
            <li><a href="/corporate/presentation">Pr&eacute;sentation LFP</a></li>
            <li><a href="/corporate/reglements">Règlements</a></li>
            <li><a href="/corporate/dncg">DNCG</a></li>
            <li><a href="/corporate/procesverbaux.html?id=89">Procès verbaux</a> </li>
            <li><a href="/corporate/communiques.html">Communiqués LFP</a></li>
            <li><a href="/corporate/calendrier">Calendriers</a></li>
            <li><a href="/corporate/delegues.html">Délégués</a></li>
            <li><a href="/corporate/arbitrage.html">Arbitrage</a></li>
            <li><a href="/corporate/footpro">FootPro Magazine</a></li>
            <li><a href="/corporate/diffuseurs_internationaux">Diffuseurs Internationaux</a></li>
        </ul>
    </li>
</ul>
<div class="clear"></div>		</div>
	</div>
	<div id="popup"></div>
	 <div id="statsDefil">
  <div id="statsDefil_contenus">
    
        <div id="stats_defile" class="sliderdefile">
  <input id="cible_stats" type="hidden" value="" />
  <ul>
        	  <li style="left:0px;">
    	  	    	      <strong>Ligue 1</strong>
    	        	    <a href="/LFPStats/stats_but?competition=D1&amp;saison=81&amp;type=j&amp;lieu=G" id="stats_but_clt_D1" class="open_stats">
	        Meilleur buteur :
    	    Zlatan IBRAHIMOVIC (27 buts)    	    </a>
    	  </li>
        	  <li style="left:400px;">
    	    <strong>Ligue 1</strong>
    	    <a href="/LFPStats/stats_passe?competition=D1&amp;saison=81&amp;type=j&amp;lieu=G" id="stats_passe_clt_D1" class="open_stats">
    	      Meilleur passeur :
    	      Dimitri PAYET (10 passes)    	    </a>
    	  </li>
    	    	  <li style="left:800px;">
	    	    <strong>Ligue 1</strong>
	    	    <a href="/LFPStats/stats_but?competition=D1&amp;saison=81" id="stats_but_D1" class="open_stats">
	    	      Moyenne: 2,6 buts/match	    	    </a>
	    	  </li>
		    	  <li style="left:1200px;">
	    	    <strong>Ligue 1</strong>
	    	    <a href="/LFPStats/stats_but?competition=D1&amp;saison=81&amp;type=c&amp;lieu=G" id="stats_but_D1_att" class="open_stats">
	    	      Meilleure attaque: Paris Saint-Germain - 60 buts	    	    </a>
	    	  </li>
		    	  <li style="left:1600px;">
	    	    <strong>Ligue 1</strong>
	    	    <a href="/LFPStats/stats_but?competition=D1&amp;saison=81&amp;type=c&amp;lieu=G&butsME=E" id="stats_but_D1_def" class="open_stats">
	    	      Meilleure défense: Paris Saint-Germain - 20 buts	    	    </a>
	    	  </li>
	    	  <li style="left:2000px;">
    	  	    	      <strong>Ligue 2</strong>
    	        	    <a href="/LFPStats/stats_but?competition=D2&amp;saison=81&amp;type=j&amp;lieu=G" id="stats_but_clt_D2" class="open_stats">
	        Meilleur buteur :
    	    Mustapha YATABARE (18 buts)    	    </a>
    	  </li>
        	  <li style="left:2400px;">
    	    <strong>Ligue 2</strong>
    	    <a href="/LFPStats/stats_passe?competition=D2&amp;saison=81&amp;type=j&amp;lieu=G" id="stats_passe_clt_D2" class="open_stats">
    	      Meilleur passeur :
    	      Alharbi EL JADEYAOUI (10 passes)    	    </a>
    	  </li>
    	    	  <li style="left:2800px;">
	    	    <strong>Ligue 2</strong>
	    	    <a href="/LFPStats/stats_but?competition=D2&amp;saison=81" id="stats_but_D2" class="open_stats">
	    	      Moyenne: 2,4 buts/match	    	    </a>
	    	  </li>
		    	  <li style="left:3200px;">
	    	    <strong>Ligue 2</strong>
	    	    <a href="/LFPStats/stats_but?competition=D2&amp;saison=81&amp;type=c&amp;lieu=G" id="stats_but_D2_att" class="open_stats">
	    	      Meilleure attaque: AS Monaco FC - 58 buts	    	    </a>
	    	  </li>
		    	  <li style="left:3600px;">
	    	    <strong>Ligue 2</strong>
	    	    <a href="/LFPStats/stats_but?competition=D2&amp;saison=81&amp;type=c&amp;lieu=G&butsME=E" id="stats_but_D2_def" class="open_stats">
	    	      Meilleure défense: SM Caen - 24 buts	    	    </a>
	    	  </li>
	    	  <li style="left:4000px;">
    	  	    	  	  <strong>Coupe de la Ligue</strong>
    	  	    	    <a href="/LFPStats/stats_but?competition=CL&amp;saison=81&amp;type=j&amp;lieu=G" id="stats_but_clt_CL" class="open_stats">
	        Meilleur buteur :
    	    Romain ALESSANDRINI (3 buts)    	    </a>
    	  </li>
    	    	  <li style="left:4400px;">
	    	    <strong>Coupe de la Ligue</strong>
	    	    <a href="/LFPStats/stats_but?competition=CL&amp;saison=81" id="stats_but_CL" class="open_stats">
	    	      Moyenne: 2,7 buts/match	    	    </a>
	    	  </li>
		    	  <li style="left:4800px;">
	    	    <strong>Coupe de la Ligue</strong>
	    	    <a href="/LFPStats/stats_but?competition=CL&amp;saison=81&amp;type=c&amp;lieu=G" id="stats_but_CL_att" class="open_stats">
	    	      Meilleure attaque: OGC Nice - 9 buts	    	    </a>
	    	  </li>
	  </ul>
</div>
<div class="clear"></div>    </div>
</div>  </body>
</html>
HTML;
    }
}