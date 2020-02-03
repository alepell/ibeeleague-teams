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

  .shadow-ghost:hover {
    box-shadow: 1px 2px 5px #66b;
  }
  
  .ghost {
    background-color: #66b;
    color: #fff;
  }

  .shadow-fairy:hover {
    box-shadow: 1px 2px 5px #e9e;
  }

  .fairy {
    background-color: #e9e;
    color: #fff;
  }

  .shadow-normal:hover {
    box-shadow: 1px 2px 5px #aa9;
  }
  .normal {
    background-color: #aa9;
    color: #fff;
  }

  .shadow-fire:hover {
    box-shadow: 1px 2px 5px #f42;
  }
  .fire {
    background-color: #f42;
    color: #fff;
  }

  .shadow-water:hover {
    box-shadow: 1px 2px 5px #39f;
  }
  .water {
    background-color: #39f;
    color: #fff;
  }

  .shadow-electric:hover {
    box-shadow: 1px 2px 5px #fc3;
  }
  .electric {
    background-color: #fc3;
    color: #fff;
  }
  .shadow-grass:hover {
    box-shadow: 1px 2px 5px #7c5;
  }
  .grass {
    background-color: #7c5;
    color: #fff;
  }

  .shadow-ice:hover {
    box-shadow: 1px 2px 5px #6cf;
  }
  .ice {
    background-color: #6cf;
    color: #fff;
  }

  .shadow-fighting:hover {
    box-shadow: 1px 2px 5px #b54;
  }
  .fighting {
    background-color: #b54;
    color: #fff;
  }
  .shadow-ground:hover {
    box-shadow: 1px 2px 5px #db5;
  }
  .ground {
    background-color: #db5;
    color: #fff;
  }
  .shadow-flying:hover {
    box-shadow: 1px 2px 5px #89f;
  }
  .flying {
    background-color: #89f;
    color: #fff;
  }
  .shadow-psychic:hover {
    box-shadow: 1px 2px 5px #f59;
  }
  .psychic {
    background-color: #f59;
    color: #fff;
  }
  .shadow-bug:hover {
    box-shadow: 1px 2px 5px #ab2;
  }
  .bug {
    background-color: #ab2;
    color: #fff;
  }
  .shadow-rock:hover {
    box-shadow: 1px 2px 5px #ba6;
  }
  .rock {
    background-color: #ba6;
    color: #fff;
  }
  .shadow-dragon:hover {
    box-shadow: 1px 2px 5px #76e;
  }
  .dragon {
    background-color: #76e;
    color: #fff;
  }
  .shadow-dark:hover {
    box-shadow: 1px 2px 5px #754;
  }
  .dark {
    background-color: #754;
    color: #fff;
  }
  .shadow-steel:hover {
    box-shadow: 1px 2px 5px #aab;
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
      transition: linear .2s;
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
      //comentario teste
      function adicionaTipo() {
        var tipos = document.querySelectorAll('.tipo');
        
        tipos.forEach(element => {
          
          if (element.innerText === 'fairy') {
            element.classList.add('fairy');
            element.parentElement.classList.add('shadow-fairy');
          } else if (element.innerText === 'ghost') {
            element.classList.add('ghost');
            element.parentElement.classList.add('shadow-ghost');
          }else if (element.innerText === 'ice') {
            element.classList.add('ice');
            element.parentElement.classList.add('shadow-ice');
          }else if (element.innerText === 'fire') {
            element.classList.add('fire');
            element.parentElement.classList.add('shadow-fire');
          }else if (element.innerText === 'water') {
            element.classList.add('water');
            element.parentElement.classList.add('shadow-water');
          }else if (element.innerText === 'steel') {
            element.classList.add('steel');
            element.parentElement.classList.add('shadow-steel');
          }else if (element.innerText === 'bug') {
            element.classList.add('bug');
            element.parentElement.classList.add('shadow-bug');
          }else if (element.innerText === 'grass') {
            element.classList.add('grass');
            element.parentElement.classList.add('shadow-grass');
          }else if (element.innerText === 'psychic') {
            element.classList.add('psychic');
            element.parentElement.classList.add('shadow-psychic');
          }else if (element.innerText === 'poison') {
            element.classList.add('poison');
            element.parentElement.classList.add('shadow-poison');
          }else if (element.innerText === 'electric') {
            element.classList.add('electric');
            element.parentElement.classList.add('shadow-electric');
          }else if (element.innerText === 'fighting') {
            element.classList.add('fighting');
            element.parentElement.classList.add('shadow-fighting');
          }else if (element.innerText === 'normal') {
            element.classList.add('normal');
            element.parentElement.classList.add('shadow-normal');
          }else if (element.innerText === 'dragon') {
            element.classList.add('dragon');
            element.parentElement.classList.add('shadow-dragon');
          }else if (element.innerText === 'flying') {
            element.classList.add('flying');
            element.parentElement.classList.add('shadow-flying');
          }else if (element.innerText === 'dark') {
            element.classList.add('dark');
            element.parentElement.classList.add('shadow-dark');
          }else if (element.innerText === 'rock') {
            element.classList.add('rock');
            element.parentElement.classList.add('shadow-rock');
          }else if (element.innerText === 'ground') {
            element.classList.add('ground');
            element.parentElement.classList.add('shadow-ground');
          }
          
          
          
        });
        
      }

      document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
          adicionaTipo();
        }, 100);
      });
      
    
    </script>

</section>