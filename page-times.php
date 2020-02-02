<?php
  /*template name: Poke New Teams*/
  $args = array(
    "post_type" => "times",
  );
  $times = new WP_Query($args);

  get_header(); 

?>

<section class="times">

    <?php while($times->have_posts()):$times->the_post(); 

      $membro1 = get_field('team_member_1');
      $membro2 = get_field('team_member_2');
      $membro3 = get_field('team_member_3');
      $membro4 = get_field('team_member_4');
      
    ?>
      <ul>
          
          <h3><?= the_title(); ?></h3>
          <li><?= $membro1['nome'];?>     <?=$membro1['tipo']?></li>
          <li><?= $membro2['nome'];?></li>
          <li><?= $membro3['nome'];?></li>
          <li><?= $membro4['nome'];?></li>

        
      </ul>
      <br>
    <?php endwhile;?>

</section>