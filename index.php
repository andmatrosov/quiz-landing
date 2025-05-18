<?php
    require_once 'questions.php';

    session_start();

    $_SESSION['clickid'] = "{clickid}";
    $_SESSION['pixel'] = "{pixel}";
    $_SESSION['source'] = @$_GET["source"];
    $_SESSION['utm_source'] = @$_GET["utm_source"];
    $_SESSION['ad_name'] = @$_GET["ad_name"];
    $_SESSION['ad_id'] = @$_GET["ad_id"];
    $_SESSION['adset_id'] = @$_GET["adset_id"];
    $_SESSION['campaign_id'] = @$_GET["campaign_id"];
    $_SESSION['campaign_name'] = @$_GET["campaign_name"];
    $_SESSION['adset_name'] = @$_GET["adset_name"];
    $_SESSION['placement'] = @$_GET["placement"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="theme-color" content="#5EEDC8">
    <link rel="stylesheet" href="scss/libs/swiper-bundle.min.css">
    <link rel="stylesheet" href="scss/main.css">
</head>
<body>
    <div class="container">
        <div class="start">
            <header class="header">
                <div class="container">
                    <div class="logo">
                        <img src="img/logo.webp" alt="Logo">
                    </div>
                </div>
            </header>

            <div class="quiz-start">
                <p class="quiz-start__subtitle">
                    Annual Men’s Health Survey conducted by the Ministry of Health of India in collaboration with international urological associations
                </p>
                <h1 class="quiz-start__title">
                    संक्षिप्त सर्वेक्षण पूरा करें और कुल $346 मूल्य के 3 बोनस सुनिश्चित रूप से प्राप्त करें, साथ ही 3 नई Toyota Camry XSE कारों के लकी ड्रा में स्वचालित रूप से भाग लें।
                </h1>
                <button class="quiz-start-btn">Start</button>
            </div>
        </div>


        <div class="quiz-wrapper" style="display: none;">
            <div class="swiper-pagination"></div>
            <div class="quiz">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php if(isset($questions) && !empty($questions)) {
                            foreach ($questions as $qKey => $question) { ?>
                                <div class="swiper-slide">
                                    <div class="quiz-question">
                                        <h4 class="quiz-title">
                                            <?php echo $question['question'] ?>
                                        </h4>
                                        <?php if(isset($question['answers'])) {?>
                                            <ul class="quiz-answers">
                                                <?php foreach ($question['answers'] as $aKey => $answer) {
                                                    $answerID = ($qKey + 1) . '_' . ($aKey + 1);
                                                    ?>
                                                    <li>
                                                        <label for="<?php echo $answerID ?>">
                                                            <input type="radio"
                                                                   id="<?php echo $answerID ?>"
                                                                   name="question-<?php echo $qKey + 1 ?>"
                                                                   value="<?php echo $answer['value'] ?? $answer['title'] ?>">
                                                            <span class="quiz-check">
                                                            <svg>
                                                                <use xlink:href="img/sprite.svg#check"></use>
                                                            </svg>
                                                        </span>
                                                            <span class="quiz-answer"><?php echo $answer['title'] ?></span>
                                                        </label>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } elseif(isset($question['textarea'])) { ?>
                                            <label class="quiz-group" for="area-<?php echo $qKey ?>">
                                            <textarea
                                              name="question-<?php echo $qKey+1 ?>"
                                              id="area-<?php echo $qKey ?>"
                                              minlength="<?php echo $question['textarea']['minLength'] ?>"
                                              placeholder="<?php echo $question['textarea']['placeholder'] ?>"
                                            ></textarea>
                                                <span>Minimum <?php echo $question['textarea']['minLength'] ?> characters</span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <button class="quiz-next-btn">Next Question</button>
                </div>
            </div>
        </div>

        <footer class="footer">
            ©
            <script>document.write(new Date().getFullYear());</script>. All rights reserved.
            <p><a href="privacy-policy.html" target="_blank">Privacy Policy</a> | <a href="terms-of-use.html"
                                                                                     target="_blank">Terms of Use</a> | <a href="contact-us.html" target="_blank">Contact Us</a></p>
        </footer>
    </div>

    <script defer="defer" src="js/libs/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>