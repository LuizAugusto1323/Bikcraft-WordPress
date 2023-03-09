<?php $contato = get_page_by_title('contato')->ID ?>

<ul>
<?php 
    $redes = get_field2('redes_sociais', $contato);
  if (isset($redes)) { foreach ($redes as $rede) { ?>
  <li><a href="<?php echo $rede['link_rede_social'] ?>" target="_blank"><img src="<?php echo $rede['imagem_rede_social'] ?>" alt="<?php echo $rede['nome_rede_social'] ?>"></a></li>
<?php } } ?>
</ul>