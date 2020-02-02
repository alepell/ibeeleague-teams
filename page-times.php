<?php
  /*template name: Poke New Teams*/
  $args = array(
    "post_type" => "times",
  );
  $times = new WP_Query($args);

  get_header();

?>

<section class="times">

    <?php while($times->have_posts()):$times->the_post(); ?>

      <ul>
        <h3><?=  ?></h3>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>

    <?php endwhile; ?>

</section>