<?php
  /*template name: Poke New Teams*/
  $args = array(
    "post_type" => "times",
  );
  $times = new WP_Query($args);

  get_header(); 

?>

<style>
  li { 
    display: flex;
    align-items: baseline;
    justify-content: space-around;
  }

  li span {
    display: flex;
    align-item: center;
    justify-content: center;
    width: 66px;
    height: 26px;
    background-color: #eee;
    border-radius: 4px;
    text-shadow: 1px 1px 5px black;
    box-shadow: inset 0 0 1px #000;
    font-size: 14px;
    cursor: pointer;
  }

  .ghost {
    background-color: #66b;
    color: #fff;
  }
  .fairy {
    background-color: #e9e;
    color: #fff;
  }
  .normal {
    background-color: #aa9;
    color: #fff;
  }
  .fire {
    background-color: #f42;
    color: #fff;
  }
  .water {
    background-color: #39f;
    color: #fff;
  }
  .electric {
    background-color: #fc3;
    color: #fff;
  }
  .grass {
    background-color: #7c5;
    color: #fff;
  }
  .ice {
    background-color: #6cf;
    color: #fff;
  }
  .fighting {
    background-color: #b54;
    color: #fff;
  }
  .ground {
    background-color: #db5;
    color: #fff;
  }
  .flying {
    background-color: #89f;
    color: #fff;
  }
  .psychic {
    background-color: #f59;
    color: #fff;
  }
  .bug {
    background-color: #ab2;
    color: #fff;
  }
  .rock {
    background-color: #ba6;
    color: #fff;
  }
  .dragon {
    background-color: #76e;
    color: #fff;
  }
  .dark {
    background-color: #754;
    color: #fff;
  }
  .steel {
    background-color: #aab;
    color: #fff;
  }

  @media (min-width: 960px) {
    .team {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .team__list {
      box-shadow: 1px 1px 5px grey;
      border-radius: 10px;
      padding: 20px;
      width: 25%;
    }
    .team__list li {
      box-shadow: 1px 1px 5px grey;
      margin-top: 15px;
      padding: 7px;
      width: 100%;
      height: 40px;
      border-radius: 100px;
    }
  }
</style>

<section class="team">

    <?php while($times->have_posts()):$times->the_post(); 

      $membro1 = get_field('team_member_1');
      $membro2 = get_field('team_member_2');
      $membro3 = get_field('team_member_3');
      $membro4 = get_field('team_member_4');
      
    ?>
      <ul class="team__list">
          
          <h3><?= the_title(); ?></h3>
          <li>
            <p><?= $membro1['nome'];?></p>
            <span class="tipo"><?= $membro1['tipo'];?></span>
          </li>
          <li>
            <p><?= $membro2['nome'];?></p>
            <span class="tipo"><?= $membro2['tipo'];?></span>
          </li>
          <li>
            <p><?= $membro3['nome'];?></p>
            <span class="tipo"><?= $membro3['tipo'];?></span>
          </li>
          <li>
            <p><?= $membro4['nome'];?></p>
            <span class="tipo"><?= $membro4['tipo'];?></span>
          </li>
          

        
      </ul>
      
    <?php endwhile;?>

  
    <script>
      //script de adicionar cores aos tipos dinamicamente
      function adicionaTipo() {
        var tipos = document.querySelectorAll('.tipo');
        
        tipos.forEach(element => {
          
          if (element.innerText === 'fairy') {
            element.classList.add('fairy');
          } else if (element.innerText === 'ghost') {
            element.classList.add('ghost');
          }else if (element.innerText === 'ice') {
            element.classList.add('ice');
          }else if (element.innerText === 'fire') {
            element.classList.add('fire');
          }else if (element.innerText === 'water') {
            element.classList.add('water');
          }else if (element.innerText === 'steel') {
            element.classList.add('steel');
          }else if (element.innerText === 'bug') {
            element.classList.add('bug');
          }else if (element.innerText === 'grass') {
            element.classList.add('grass');
          }else if (element.innerText === 'psychic') {
            element.classList.add('psychic');
          }else if (element.innerText === 'poison') {
            element.classList.add('poison');
          }else if (element.innerText === 'electric') {
            element.classList.add('electric');
          }else if (element.innerText === 'fighting') {
            element.classList.add('fighting');
          }else if (element.innerText === 'normal') {
            element.classList.add('normal');
          }else if (element.innerText === 'dragon') {
            element.classList.add('dragon');
          }else if (element.innerText === 'flying') {
            element.classList.add('flying');
          }else if (element.innerText === 'dark') {
            element.classList.add('dark');
          }else if (element.innerText === 'rock') {
            element.classList.add('rock');
          }else if (element.innerText === 'ground') {
            element.classList.add('ground');
          }
          
          
          
        });
        
      }

      document.addEventListener("DOMContentLoaded", function() {
        adicionaTipo();
      });
      
    
    </script>

</section>