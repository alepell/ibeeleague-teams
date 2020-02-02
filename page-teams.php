<?php
 /*template name: Poke TEAMS*/
 $args = array(
    "post_type" => "duplas",
 );
 $teams = new WP_Query($args);

 get_header(); ?>

 <style>
 #page-site-header{
   padding:100px 0;
 }
  .team__name{
    padding: 8px 0;
  }

  .teamCard:nth-child(odd){
    /* border: #3a85eb2b dashed 2px; */
    margin-bottom: 50px;
  }
  .teamCard:nth-child(odd) .team__name{
    /* border-bottom: #3a85eb2b dashed 2px; */
  }

  .teamCard:nth-child(even){
    /* border: #eb3a3a75 dashed 2px; */
    margin-bottom: 50px;
  }
  .teamCard:nth-child(even) .team__name{
    /* border-bottom: #eb3a3a75 dashed 2px; */
  }

  .team__playerBox{
    height: 100%;
    padding: 0 20px;
    position: relative;
    top: -6px;
  }
  .player__name{
    width: 100%;
    margin: 16px 0;
  }
  .img_mask{
    width: 200px;
    display: inline-block;
  }
  .player__img{

  }

  .player__pkms{
     display: inline-block;
     width: 100%;
     padding: 0 20px;
  }
  .pkm__img{
     width: 32%;
     display: inline-block;
   }
   .pkm__gif{
     display: none;
   }

  .pokemon__name{
    display: none;
  }

  @media(min-width:800px){
    .team__name{
      display: flex;
      justify-content: center;
      font-size: 30px;
    }
    .player__img{
      height: 125px;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    display: inline-block;
    border-radius: 50%;
    border: 3px solid #E1E1E1;

    }
    .player__name{
      display:none;
    }
    .player__pkms{
      width: 75%;
      float: right;
      padding-top: 25px;
    }
    .img_mask{
      width: 120px;
      margin-left: 35px;
    }
    .pkm__img{
     display: none;
    }
    .pkm__gif{
     display: inline-block;
     width:15%;
   }
   .pkm__gif amp-img{
     display: block;
  height: auto;
  max-height: 100%;
  max-width: 100%;
  width: auto;
  margin: auto;
   }

   #secondary{
    position: sticky;
    top: 130px;
   }
  }
 </style>

<div id="primary" class="content-area" >
   <main id="main" class="site-main" role="main">
      <?php while($teams->have_posts()):$teams->the_post();

               $posts = get_field('participantes');

               if( $posts ): ?>

                 <div class="teamCard">
                   <header class="team__name">
                     <strong>Team :&nbsp</strong>
                     <?=the_title();?>
                   </header>
                   <div class="team__playersBox">
                     <?php foreach ($posts as $post): setup_postdata($post);
                                    $avatar_url = get_field('avatar'); ?>
                                    <div class="img_mask">
                                       <div  class="player__img"  style="background-image:url(<?= $avatar_url['sizes']['medium_large']; ?>)" title="<?=the_title()?>"></div>
                                       <div class="player__name"><?=the_title()?>'s pokémon</div>
                                    </div>

                                    <div class="player__pkms">
                                             <?php for ($i=1; $i<= 6; $i++):
                                                 $img_pokemon_db=get_field("pokemon_db{$i}");?>

                                                <a href="https://pokemondb.net/pokedex/<?= the_field("poke{$i}"); ?>" target="_blank">
                                                  <div class="pkm__img">
                                                      <amp-img
                                                      src="https://img.pokemondb.net/artwork/<?=($img_pokemon_db)? $img_pokemon_db : the_field("poke{$i}")?>.jpg"
                                                      title="<?= the_field("poke{$i}"); ?>"
                                                      height="80"
                                                      width="80"
                                                      layout="responsive"
                                                      ></amp-img>
                                                  </div>

                                                  <div class="pkm__gif">
                                                      <amp-img
                                                      src="https://play.pokemonshowdown.com/sprites/ani/<?= the_field("poke{$i}"); ?>.gif"
                                                      title="<?= the_field("poke{$i}"); ?>"
                                                      layout="intrinsic"
                                                      height="100"
                                                      width="100"
                                                      ></amp-img>
                                                  </div>

                                                  <span class="pokemon__name"><?= the_field("poke{$i}"); ?></span>

                                                </a>
                                            <?php endfor; ?>
                                    </div>

                     <?php endforeach;
                           wp_reset_postdata();
                           ?>
                   </div>

                 </div>

               <?php endif;


            endwhile; ?>

    </main>
</div>
<?php
get_sidebar();
get_footer();
?>
