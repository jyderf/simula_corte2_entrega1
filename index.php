<?php include './formato/head.php'; ?>

<span id="sl_play" class="sl_command">&nbsp;</span>
<span id="sl_pause" class="sl_command">&nbsp;</span>
<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>

<h1><span class="cursive">Algoritmos</span> <span>con números</span> pseudoaleatorios  </h1>
<h2 class="sread">Imágenes simulación</h2>

<section id="slideshow">

    <a class="commands prev commands1" href="#sl_i4" title="Go to last slide">&lt;</a>
    <a class="commands next commands1" href="#sl_i2" title="Go to 2nd slide">&gt;</a>
    <a class="commands prev commands2" href="#sl_i1" title="Go to 1rst slide">&lt;</a>
    <a class="commands next commands2" href="#sl_i3" title="Go to 3rd slide">&gt;</a>
    <a class="commands prev commands3" href="#sl_i2" title="Go to 2nd slide">&lt;</a>
    <a class="commands next commands3" href="#sl_i4" title="Go to 4th slide">&gt;</a>
    <a class="commands prev commands4" href="#sl_i3" title="Go to 3rd slide">&lt;</a>
    <a class="commands next commands4" href="#sl_i1" title="Go to first slide">&gt;</a>

    <a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>
    <a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>

    <div class="container">
        <div class="c_slider"></div>
        <div class="slider">
            <figure>
                <img src="img/1.jpg" alt="" width="640" height="310" />
                <figcaption>Simulación</figcaption>
            </figure>           
            <figure>
                <img src="img/2.png" alt="" width="640" height="310" />
                <figcaption>Cuadrados medios</figcaption>
            </figure>           
            <figure>
                <img src="img/3.png" alt="" width="640" height="310" />
                <figcaption>Multiplicador<em>(do)</em> constante</figcaption>
            </figure>           
            <figure>
                <img src="img/4.jpg" alt="" width="640" height="310" />
                <figcaption>Productos medios</figcaption>
            </figure>          
            <figure>
                <img src="img/5.jpg" alt="" width="640" height="310" />
                <figcaption>Números pseudoaleatorios</figcaption>
            </figure>
        </div>
    </div>

    <span id="timeline"></span>

    <ul class="dots_commands">
        <li><a title="Show slide 1" href="#sl_i1">Slide 1</a></li>
        <li><a title="Show slide 2" href="#sl_i2">Slide 2</a></li>
        <li><a title="Show slide 3" href="#sl_i3">Slide 3</a></li>
        <li><a title="Show slide 4" href="#sl_i4">Slide 4</a></li>
    </ul>

</section>




<?php include './formato/floor.php'; ?>