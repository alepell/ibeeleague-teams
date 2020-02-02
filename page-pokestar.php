<?php
  /*template name: pokestar
  */
$args = array(
  'post_type'=>'competidores',
  'posts_per_page' => -1
);

$query = new WP_query($args);
$champion= get_field('champion_details');
$background_image_URL= get_field('background_image');

get_header(); 

?>

<style>
  .card{
    width: 100%;
    padding-top: 40px;
    padding-bottom: 40px;
    border-bottom: solid #d9d9d9 1px;
  }
  .card__trainer_name{
    font-size: 20px;
    margin-bottom: 16px;
    font-weight: 400;
    padding-left: 16px;
  }
  .card__trainer_box{
    display: flex;
    flex-wrap: wrap;
  }
 .card__trainer_img{
    width: 25%;
    max-width: 180px;
    height: 180px;
    margin-right: 50px;
    box-shadow: 11px 10px 15px;
    border-radius: 10%;
    background-repeat: no-repeat;
    background-size: cover;
    display: none;
 }

 .card__poke_list{
    padding-left: 16px;
    /* background: #f6f6f6b5; */
    /* border-radius: 8px; */
    padding: 16px;
    padding-right: 0;
    border: dashed 2px #d3e4f2;
    /* box-shadow:11px 10px 15px; */
 }

 .pokemon__image{
   margin-right:10px;
 }
 .pokemon__gif{
     display:none;
   }
 .poke__footer{
  /* transform: skew(-50deg, 0deg);
  position: relative;
  top: -76px;
  z-index: -1;
  width: 95%;
  height: 90px;
  background: #cb9d87c9;
  border: solid 2px #6b4500a6;
  box-shadow: 17px 3px 20px; */
}
.poke_names{
      /* top: -83px; */
    height: 40px;
    position: relative;
    display: flex;
    /* margin-left: 280px; */
    width: 100%;
    flex-wrap: wrap;
}
.poke_names span{
  width: 100px;
}

 @media(min-width:800px){
  .card__trainer_img{
      display:block;
    }
    .card__poke_list{
      width: 68%;
    }
    .poke_names{
      margin-left:233px;
    }
  
  }

  @media(min-width:1200px){
    .card{
      height:350px;
    }
    .card__poke_list{
      width: 78%;
      position: relative;
      left: 30px;
      background: none;
      border:none;
      border-radius: 0px;
      box-shadow:none;
   }
   .pokemon__image{
     display:none;
   }
   .pokemon__gif{
     display:inline-block;
   }
  
    .poke__footer{
      transform: skew(-55deg, 0deg);
      position: relative;
      top: -35px;
      left: -10px;
      z-index: -1;
      width: 79%;
      height: 60px;
      background: #cb9d87c9;
      border: solid 2px #6b4500a6;
      box-shadow: 17px 3px 20px;
    }
    .poke_names{
      top: -30px;
      height: 0px;
      position: relative;
      display: flex;
      margin-left: 270px;
      width: 55%;
      justify-content: space-between;
    }
  }
</style>


<div id="primary" class="content-area" 
  style="
    width: 100%;
    padding: 0;
  ">
  <main id="main" class="site-main" role="main">
    <section id="cards">

    <?php 
      $id_numb=1;
      $i=1;
      $number_of_pokes=6;
      while ($query->have_posts()): $query->the_post(); $avatar_url = get_field('avatar'); 
    ?>

    <div class="card" id="<?= $id_numb; ?>">
      <header class="card__trainer_name"><?= the_title();?></header>
      <div class="card__trainer_box">
        <div class="card__trainer_img" style="background-image:url(<?= $avatar_url['sizes']['medium_large']; ?>)">
        
        </div>

        <div class="card__poke_list">
          <?php 
          $pokemon_names=[];
          while ($i <= $number_of_pokes) : 
            $img_pokemon_db=get_field("pokemon_db{$i}");
          ?>
            <a href="https://pokemondb.net/pokedex/<?= the_field("poke{$i}"); ?>">   
                <amp-img
                src="https://img.pokemondb.net/artwork/<?=($img_pokemon_db)? $img_pokemon_db : the_field("poke{$i}")?>.jpg"
                title="<?= the_field("poke{$i}"); ?>"
                class="pokemon__image"
                height="80"
                width="80"
                ></amp-img>


                <amp-img
                src="https://play.pokemonshowdown.com/sprites/ani/<?= the_field("poke{$i}"); ?>.gif"
                title="<?= the_field("poke{$i}"); ?>"
                class="pokemon__gif"
                layout="intrinsic"
                height="100"
                width="100"
                ></amp-img>
            </a>
            <?php
            
            array_push($pokemon_names, get_field("poke{$i}"));            

          $i++; endwhile; $i=1; ?>   
          <div class="poke__footer"></div>   
        </div>
        <?php
        echo '<div class="poke_names">';
        foreach($pokemon_names as $name): ?>
           <span>
              <a href="https://pokemondb.net/pokedex/<?=$name?>">        
                <?=$name?>
              </a>
            </span>
  <?php endforeach;
        echo "</div>";
        ?>
      </div>
    </div>

    <?php  $id_numb++; endwhile;  wp_reset_postdata(); ?>  
      </section>
			

	</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer(); 
?>
