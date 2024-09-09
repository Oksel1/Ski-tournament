<?php

$main = "

<div class='container'>
    <div class='heading'>
        <h3>Galeria <span>Zdjęć</span></h3>
    </div>

    <div class='box'>
    
        <div class='dream'>
          <img src='pics/galeria/21.jpg' alt='' onclick='openModal();currentSlide(1)' class='hover-shadow cursor'>
          <img src='pics/galeria/2.jpg' alt='' onclick='openModal();currentSlide(2)' class='hover-shadow cursor'>
          <img src='pics/galeria/22.jpg' alt='' onclick='openModal();currentSlide(3)' class='hover-shadow cursor'>
          <img src='pics/galeria/3.jpg' alt='' onclick='openModal();currentSlide(4)' class='hover-shadow cursor'>
          <img src='pics/galeria/4.jpg' alt='' onclick='openModal();currentSlide(5)' class='hover-shadow cursor'>
          <img src='pics/galeria/5.jpg' alt='' onclick='openModal();currentSlide(6)' class='hover-shadow cursor'>
          <img src='pics/galeria/6.jpg' alt='' onclick='openModal();currentSlide(7)' class='hover-shadow cursor'>
          <img src='pics/galeria/7.jpg' alt='' onclick='openModal();currentSlide(8)' class='hover-shadow cursor'>
          <img src='pics/galeria/8.jpg' alt='' onclick='openModal();currentSlide(9)' class='hover-shadow cursor'>
          <img src='pics/galeria/27.jpg' alt='' onclick='openModal();currentSlide(10)' class='hover-shadow cursor'>
          <img src='pics/galeria/9.jpg' alt='' onclick='openModal();currentSlide(11)' class='hover-shadow cursor'>
          <img src='pics/galeria/10.jpg' alt='' onclick='openModal();currentSlide(12)' class='hover-shadow cursor'>
          <img src='pics/galeria/1.jpg' alt='' onclick='openModal();currentSlide(13)' class='hover-shadow cursor'>
          <img src='pics/galeria/23.jpg' alt='' onclick='openModal();currentSlide(14)' class='hover-shadow cursor'>
          <img src='pics/galeria/25.jpg' alt='' onclick='openModal();currentSlide(15)' class='hover-shadow cursor'>
         
        </div>
        

        <div class='dream'>
            
            <img src='pics/galeria/17.jpg' alt='' onclick='openModal();currentSlide(16)' class='hover-shadow cursor'>
            <img src='pics/galeria/12.jpg' alt='' onclick='openModal();currentSlide(17)' class='hover-shadow cursor'>
            <img src='pics/galeria/26.jpg' alt='' onclick='openModal();currentSlide(18)' class='hover-shadow cursor'>
            <img src='pics/galeria/13.jpg' alt='' onclick='openModal();currentSlide(19)' class='hover-shadow cursor'>
            <img src='pics/galeria/14.jpg' alt='' onclick='openModal();currentSlide(20)' class='hover-shadow cursor'>
            <img src='pics/galeria/15.jpg' alt='' onclick='openModal();currentSlide(21)' class='hover-shadow cursor'>
            <img src='pics/galeria/16.jpg' alt='' onclick='openModal();currentSlide(22)' class='hover-shadow cursor'>
            <img src='pics/galeria/11.jpg' alt='' onclick='openModal();currentSlide(23)' class='hover-shadow cursor'>
            <img src='pics/galeria/18.jpg' alt='' onclick='openModal();currentSlide(24)' class='hover-shadow cursor'>
            <img src='pics/galeria/19.jpg' alt='' onclick='openModal();currentSlide(25)' class='hover-shadow cursor'>
            <img src='pics/galeria/20.jpg' alt='' onclick='openModal();currentSlide(26)' class='hover-shadow cursor'>
            <img src='pics/galeria/28.jpg' alt='' onclick='openModal();currentSlide(27)' class='hover-shadow cursor'>
            <img src='pics/galeria/29.jpg' alt='' onclick='openModal();currentSlide(28)' class='hover-shadow cursor'>
            <img src='pics/galeria/30.jpg' alt='' onclick='openModal();currentSlide(29)' class='hover-shadow cursor'>
            <img src='pics/galeria/24.jpg' alt='' onclick='openModal();currentSlide(30)' class='hover-shadow cursor'>

        </div> 

    </div>
</div>


<div id='myModal' class='modal'>
  <span class='close cursor' onclick='closeModal()'>&times;</span>
  <div class='modal-content'>
  
    <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
    <a class='next' onclick='plusSlides(1)'>&#10095;</a>
    <div class='mySlides'>
      <div class='numbertext'>1 / 30</div>
      <img class='currentPhoto' src='pics/galeria/21.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>2 / 30</div>
      <img class='currentPhoto' src='pics/galeria/2.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>3 / 30</div>
      <img class='currentPhoto' src='pics/galeria/22.jpg' style='width:100%'>
    </div>
    
    <div class='mySlides'>
      <div class='numbertext'>4 / 30</div>
      <img class='currentPhoto' src='pics/galeria/3.jpg' style='width:100%'>
    </div>
    
    <div class='mySlides'>
      <div class='numbertext'>5 / 30</div>
      <img class='currentPhoto' src='pics/galeria/4.jpg' style='width:100%'>
    </div>
    <div class='mySlides'>
      <div class='numbertext'>6 / 30</div>
      <img class='currentPhoto' src='pics/galeria/5.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>7 / 30</div>
      <img class='currentPhoto' src='pics/galeria/6.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>8 / 30</div>
      <img class='currentPhoto' src='pics/galeria/7.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>9 / 30</div>
      <img class='currentPhoto' src='pics/galeria/8.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>10 / 30</div>
      <img class='currentPhoto' src='pics/galeria/27.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>11 / 30</div>
      <img class='currentPhoto' src='pics/galeria/9.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>12 / 30</div>
      <img class='currentPhoto' src='pics/galeria/10.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>13 / 30</div>
      <img class='currentPhoto' src='pics/galeria/1.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>14 / 30</div>
      <img class='currentPhoto' src='pics/galeria/23.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>15 / 30</div>
      <img class='currentPhoto' src='pics/galeria/25.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>16 / 30</div>
      <img class='currentPhoto' src='pics/galeria/17.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>17 / 30</div>
      <img class='currentPhoto' src='pics/galeria/12.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>18 / 30</div>
      <img class='currentPhoto' src='pics/galeria/26.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>19 / 30</div>
      <img class='currentPhoto' src='pics/galeria/13.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>20 / 30</div>
      <img class='currentPhoto' src='pics/galeria/14.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>21 / 30</div>
      <img class='currentPhoto' src='pics/galeria/15.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>22 / 30</div>
      <img class='currentPhoto' src='pics/galeria/16.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>23 / 30</div>
      <img class='currentPhoto' src='pics/galeria/11.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>24 / 30</div>
      <img class='currentPhoto' src='pics/galeria/18.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>25 / 30</div>
      <img class='currentPhoto' src='pics/galeria/19.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>26 / 30</div>
      <img class='currentPhoto' src='pics/galeria/20.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>27 / 30</div>
      <img class='currentPhoto' src='pics/galeria/28.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>28 / 30</div>
      <img class='currentPhoto' src='pics/galeria/29.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>29 / 30</div>
      <img class='currentPhoto' src='pics/galeria/30.jpg' style='width:100%'>
    </div>

    <div class='mySlides'>
      <div class='numbertext'>30 / 30</div>
      <img class='currentPhoto' src='pics/galeria/24.jpg' style='width:100%'>
    </div>





    <div class='gridPhotosContainer'>
    <div class='column'>
      <img class='demo cursor' src='pics/galeria/21.jpg' style='width:100%' onclick='currentSlide(1)' alt='Nature and sunrise'>
    </div>
    <div class='column'>
      <img class='demo cursor' src='pics/galeria/2.jpg' style='width:100% ' onclick='currentSlide(2)' alt='Snow'>
    </div>
    <div class='column'>
      <img class='demo cursor' src='pics/galeria/22.jpg' style='width:100%' onclick='currentSlide(3)' alt='Mountains and fjords'>
    </div>
    <div class='column'>
      <img class='demo cursor' src='pics/galeria/3.jpg' style='width:100%' onclick='currentSlide(4)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/4.jpg' style='width:100%' onclick='currentSlide(5)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/5.jpg' style='width:100%' onclick='currentSlide(6)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/6.jpg' style='width:100%' onclick='currentSlide(7)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/7.jpg' style='width:100%' onclick='currentSlide(8)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/8.jpg' style='width:100%' onclick='currentSlide(9)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/27.jpg' style='width:100%' onclick='currentSlide(10)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/9.jpg' style='width:100%' onclick='currentSlide(11)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/10.jpg' style='width:100%' onclick='currentSlide(12)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/1.jpg' style='width:100%' onclick='currentSlide(13)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/23.jpg' style='width:100%' onclick='currentSlide(14)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/25.jpg' style='width:100%' onclick='currentSlide(15)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/17.jpg' style='width:100%' onclick='currentSlide(16)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/12.jpg' style='width:100%' onclick='currentSlide(17)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/26.jpg' style='width:100%' onclick='currentSlide(18)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/13.jpg' style='width:100%' onclick='currentSlide(19)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/14.jpg' style='width:100%' onclick='currentSlide(20)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/15.jpg' style='width:100%' onclick='currentSlide(21)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/16.jpg' style='width:100%' onclick='currentSlide(22)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/11.jpg' style='width:100%' onclick='currentSlide(23)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/18.jpg' style='width:100%' onclick='currentSlide(24)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/19.jpg' style='width:100%' onclick='currentSlide(25)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/20.jpg' style='width:100%' onclick='currentSlide(26)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/28.jpg' style='width:100%' onclick='currentSlide(27)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/29.jpg' style='width:100%' onclick='currentSlide(28)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/30.jpg' style='width:100%' onclick='currentSlide(29)' alt='Northern Lights'>
    </div>
     <div class='column'>
      <img class='demo cursor' src='pics/galeria/24.jpg' style='width:100%' onclick='currentSlide(30)' alt='Northern Lights'>
    </div>
    </div>
  </div>
</div>

<script src='js/gallery-modal.js'></script>

";

include "layout.php";