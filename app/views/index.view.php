<?php $hobby_list =& $data['hobby']; /* @var $hobby_list Hobby */  ?>
<?php $social_list =& $data['social']; /* @var $social_list Social */  ?>


<div class="row">
  <div class="col-md-7">
    <h2>
      <i class="fa fa-user"></i> <?= e('O mně', 'About Me') ?>
    </h2>


    <div class="index-text">
      <div class="photo">
        <img src="<?= URL ?>/files/photo.jpg" alt="" />
      </div>

      <?php ob_start(); ?>
        <p>
          Momentálně se živím jako vývojář webového software ve vědecké organizaci, která se věnuje jadernému výzkumu.
          Mám na starosti celý cyklus – od počátečního modelování dat a návrhu architektury relační databáze, přes kód samotný až po front end a UX našich zaměstnanců.
        </p>
        <p>
          <a href="javascript:void(0)" onclick="portfolio(7);">Systém zajišťuje personální i projektové řízení pro společnost o ~350 zaměstnancích.</a> Jedná se určitě o můj největší projekt,
          ale najde se i spousta menších věcí a fanouškovských záležitostí, <a href="<?= URL ?>/portfolio">o kterých se můžete dočíst v portfoliu</a>.
        </p>
        <p>
          Vše okolo počítačů je mým koníčkem už od dětství, ale čas trávím i četbou, sledováním filmů nebo fotografováním.
          Určitě mi neváhejte napsat s čímkoliv.
        </p>
      <?php $info_cs = ob_get_clean(); // České info z bufferu ?>


			<?php ob_start(); ?>
      <p>
        Currently I make a living by web development of software in a nuclear research company.
        I am responsible for the whole cycle – that means, I have under the control everything beginning with data modelling and drafts designing of relational database via
        the code itself to the front end and UX of our employees.
      </p>
      <p>
        <a href="javascript:void(0)" onclick="portfolio(7);">The system I created provides personal and project management for the organization of 350 employees.</a>
        Sure, it is the biggest project I am working on, but I have also worked on various not that big projects and fan things.
        <a href="<?= URL ?>/portfolio">You can find info about them in my portfolio</a>.
      </p>
      <p>
        All about computers has always been my hobby from the childhood. Also, I spend time reading books, watching films
        or making photos. Don’t hesitate to contact me with any question.
      </p>
			<?php $info_en = ob_get_clean(); // Anglické info z bufferu ?>
    </div>


    <?= e($info_cs, $info_en) // České/anglické info ?>
    
    <hr class="clear" />


    <div class="center" style="margin: 20px">
      <a href="http://cv.rychecky.cz/" class="btn btn-lg btn-dark">
        <i class="fa fa-download"></i> <?= e('Stáhnout resumé', 'Download Resumé') ?>
      </a>
    </div>

		<?php Rychecky::view('socialbar.master', $social_list) ?>
  </div>
  
  
  
  
  
  <div class="col-md-5">
    <h2>
      <i class="fa fa-cloud"></i> <?= e('Zájmy', 'Hobbies') ?>
    </h2>

    <div class="hobby-list">
      <?php foreach($hobby_list as $hobby){ ?>
        <div class="hobby" style="<?= array_to_css($hobby->randomHobbyCss()) // Náhodná pozice ve wordcloudu ?>">
          <?= $hobby->name // Název koníčku ?>
        </div>
      <?php } ?>
    </div>
    
    <hr style="visibility: hidden; clear: both" />
  </div>
</div>