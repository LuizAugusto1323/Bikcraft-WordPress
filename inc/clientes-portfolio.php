<?php $portfolio = get_page_by_title('portfolio')->ID ?> 

<ul class="portfolio_lista rslides_portfolio">
<?php 
    $portfolios = get_field2('portfolio', $portfolio);
  if (isset($portfolios)) { foreach ($portfolios as $portifo) { ?>
  <li>
    <div class="grid-8"><img src="<?php echo $portifo['portfolio_imagem1'];?>" alt="Bicicleta Retrô"></div>
    <div class="grid-8"><img src="<?php echo $portifo['portfolio_imagem2'];?>" alt="Bicicleta Passeio"></div>
    <div class="grid-16"><img src="<?php echo $portifo['portfolio_imagem3'];?>" alt="Bicicleta Esporte"></div>
  </li>
<?php } } ?>
</ul>
<?php if(!is_page('portfolio')) { ?>
<div class="call">
  <p><?php the_field('chamada_portfolio', $portfolio); ?></p>
  <a href="/portfolio/" class="btn">Portfólio</a>
</div>
<?php } ?>