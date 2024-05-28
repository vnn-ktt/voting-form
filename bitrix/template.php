<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<? if (!empty($arResult["ERROR_MESSAGE"])): ?>
		<div class="vote-note-error">
			<div class="vote-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"])?></div>
		</div>
	<? endif; ?>
	<? if (!empty($arResult["OK_MESSAGE"])): ?>
		<div class="vote-note-box vote-note-note">
			<div class="vote-note-box-text"><?=ShowNote($arResult["OK_MESSAGE"])?></div>
		</div>
	<? endif; ?>
	<div class="form-slider-container">
		<div class="testimonial mySwiper">
			<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="form swiper-wrapper">
				<input type="hidden" name="vote" value="Y">
				<input type="hidden" name="PUBLIC_VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
				<input type="hidden" name="VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
				<?=bitrix_sessid_post()?>
				<?
				$iCount = 0;
				foreach ($arResult["QUESTIONS"] as $arQuestion):
					$iCount++;
				?>
					<div class="slide swiper-slide">

							<? if ($arQuestion["IMAGE"] !== false): ?>
								<img class="image" src="<?=$arQuestion["IMAGE"]["SRC"]?>" alt="Изображение вопроса" />
							<? endif; ?>
							<p class="question">
								<?=$arQuestion["QUESTION"]?>
								<?if($arQuestion["REQUIRED"]=="Y"){echo "<span class='starrequired'>*</span>";}?>
							</p>

							<div class="input-container">
								<?
								$iCountAnswers = 0;
								foreach ($arQuestion["ANSWERS"] as $arAnswer):
									$iCountAnswers++;
									$value=(isset($_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]]) && 
									$_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]] == $arAnswer["ID"]) ? 'checked="checked"' : '';
								?>
									<input class="input input-radio" type="radio" <?=$value?> name="vote_radio_<?=$arAnswer["QUESTION_ID"]?>"<?
									?>id="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>" <?
									?>value="<?=$arAnswer["ID"]?>" <?=$arAnswer["~FIELD_PARAM"]?> />
									<label class="label" for="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>"><?=$arAnswer["MESSAGE"]?></label>
								<? endforeach ?>
							</div>
					</div>
				<? endforeach ?>
				<div class="slide swiper-slide">
					<p class="question">
						Вы ответили на все вопросы и опрос был окончен.
					</p>
					<input
					type="submit"
					onclick="openModal()"
					class="input input-submit"
					value="<?=GetMessage("VOTE_SUBMIT_BUTTON")?>"
					/>
				</div>
			</form>
			<div class="swiper-button-next nav-btn"></div>
			<div class="swiper-button-prev nav-btn"></div>
			<div class="swiper-pagination"></div>
		</div>

		<div class="modal" id="modal">
		<div class="modal-content">
			<p>Форма была успешно отправлена!</p>
			<span class="close" onclick="closeModal()">&times;</span>
		</div>
		</div>
		<div class="overlay"></div>
	</div>

	<script src="/local/templates/books/components/bitrix/voting.form/slider/js/slider.js"></script>
	<script src="/local/templates/books/components/bitrix/voting.form/slider/js/modal.js"></script>

