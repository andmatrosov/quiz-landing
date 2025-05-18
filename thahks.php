<?php
session_start();
$link = "https://be11.tech/5QZk4sqH?source=".@$_SESSION['source']."&utm_source=" . @$_SESSION['utm_source'] . "&ad_name=".@$_SESSION['ad_name']."&ad_id=".@$_SESSION['ad_id']."&adset_id=".@$_SESSION['adset_id']."&campaign_id=".@$_SESSION['campaign_id']."&campaign_name=".@$_SESSION['campaign_name']."&adset_name=".@$_SESSION['adset_name']."&placement=".@$_SESSION['placement'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thankyou-page/css/main.css">
    <title>Thank you</title>
    <script>
        var targetLink = "https://be11.tech/5QZk4sqH?source={source}&utm_source={utm_source}&ad_name={ad_name}&ad_id={ad_id}&adset_id={adset_id}&campaign_id={campaign_id}&campaign_name={campaign_name}&adset_name={adset_name}&placement={placement}"
    </script>
    <script>
        function generateRandomTicketNumber(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                result += characters[randomIndex];
            }
            return result;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const ticketNumberElement = document.querySelector('.ticket__number-text');
            const randomTicketNumber = generateRandomTicketNumber(7);
            if(localStorage.getItem('promocode')) {
                ticketNumberElement.textContent = localStorage.getItem('promocode')
            } else {
                localStorage.setItem('promocode', randomTicketNumber)
                ticketNumberElement.textContent = randomTicketNumber;
            }
        });
    </script>
</head>

<body>

    <section class="thanks">
        <div class="thanks__container container">
            <header class="thanks__header">
                <div class="container">
                    <div class="logo">
                        <img src="img/logo.webp" alt="Logo">
                    </div>
                </div>
            </header>
            <div class="congratulation">
                <div class="congratulation__title">सर्वे में भाग लेने के लिए धन्यवाद!</div>
                <p class="congratulation__description">
                    Congratulations! You made it in time to receive prize bonuses and participate in the draw for one of three new Toyota Camry XSE cars!
                </p>
            </div>
            <div class="subscription">
                <div class="subscription__item">
                    <div class="subscription__item-title">30-Day Premium Planner - 49$</div>
                    <div class="subscription__item-body">
                        <p class="subscription__item-text">
                            लक्ष्य प्राप्ति के लिए प्रीमियम कैलेंडर, जो आपकी आदतों, आहार या दवाओं के सेवन पर नज़र रखने में मदद करेगा
                        </p>
                        <a class="subscription__right" href="Premium_30_Day_Planner.pdf" download="Free month plan">TAKE FREE</a>
                    </div>
                </div>
                <div class="subscription__item">
                    <div class="subscription__item-title">Private Community Access - 297$</div>
                    <div class="subscription__item-body">
                        <p class="subscription__item-text">
                            एक बंद समूह, जहाँ आप विशेषज्ञों और समान सोच रखने वाले लोगों से सलाह, समर्थन और प्रतिक्रिया प्राप्त कर सकते हैं
                        </p>
                        <a class="subscription__right" href="https://t.me/DrAmitBansal" target="_blank">TAKE FREE</a>
                    </div>
                </div>
                <div class="subscription__item">
                    <div class="subscription__item-title">Best Prostatitis Remedy - ₹11,990</div>
                    <div class="subscription__item-body">
                        <p class="subscription__item-text">
                            पहला उत्पाद जिसे भारत सरकार की आधिकारिक मान्यता और स्वास्थ्य मंत्रालय द्वारा प्रमाणित प्रभावशीलता प्राप्त हुई है
                        </p>
                        <a class="subscription__right" href="<?php echo $link; ?>" target="_blank">SALE -79%</a>
                    </div>
                </div>
            </div>
            <div class=" ticket">
                <div class="ticket__body">
                    <div class="ticket__title">Your lottery ticket</div>
                    <p class="ticket__description">
                        You are automatically participating in the draw for 3 new Toyota Camry XSE cars
                    </p>
                    <p class="ticket__result">Draw results: <span class="end-date"></span></p>
                </div>
                <div class="ticket__number">
                    <div class="ticket__number-wrap"><span class="ticket__number-text">X2S54G0</span></div>
                </div>
            </div>
            <div class="thanks__bottom">
                <div class="thanks__bottom-text">
                    नीचे अपना ईमेल दर्ज करें ताकि हम आपसे संपर्क कर सकें, अगर आपका टिकट जीत जाता है! हम आपकी
                    सफलता और अच्छे स्वास्थ्य की कामना करते हैं!
                </div>
                <form method="post" action="" class="thanks__bottom-wrap" style="display: none">
                    <div class="form-group">
                        <input type="email" id="email" placeholder="Enter your email..." class="thanks__bottom-mail">
                        <label for="email">Enter a correct email</label>
                    </div>
                    <button class="thanks__bottom-btn" type="submit">Notify me</button>
                </form>
                <div class="thanks__bottom-complete" id="subscribe-form-sended" style="display: none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M9 17.988c4.97 0 9-4.027 9-8.994S13.97 0 9 0 0 4.027 0 8.994s4.03 8.994 9 8.994" fill="#2FDF84"/>
                        <path d="M1.8 8.994C1.8 4.331 5.352.496 9.9.046A9 9 0 0 0 9 0C4.03 0 0 4.027 0 8.994s4.03 8.994 9 8.994q.456 0 .9-.046c-4.548-.45-8.1-4.285-8.1-8.948" fill="#00B871"/>
                        <path d="M8.1 12.192a.6.6 0 0 1-.424-.176l-2.6-2.598.848-.848L8.1 10.744l4.777-4.772.848.848-5.2 5.196a.6.6 0 0 1-.425.176" fill="#000"/>
                    </svg>
                  <span>Done! If your ticket wins - we will contact you!</span>
                </div>
            </div>
            <button id="share-button" class="thanks__share">
                <span class="thanks__share-text">Share this product with a friend and get a gift
                    bundle!</span>
            </button>
        </div>
    </section>

    <script>
        // Проверка наличия cookies с IP-адресом
        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;
        }

        function setCookie(name, value, days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            let expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        // Показ формы подписки только если она еще не была отправлена
        if (!getCookie('emailSubmitted')) {
            document.getElementById("subscribe-form").style.display = "flex";
        } else {
          document.getElementById("subscribe-form-sended").style.display = "flex";
        }


        // Подписка
        const formSubscribe = document.querySelector('.thanks__bottom-wrap');
        if (formSubscribe) {
            formSubscribe.addEventListener('submit', (e) => {
                e.preventDefault();
                const form = e.target,
                    input = form.querySelector('input');

                if (isValidEmail(input.value)) {
                    // Показываем анимацию исчезания
                        document.getElementById('subscribe-form').style.display = 'none';
                        document.getElementById('subscribe-form-sended').style.display = 'flex';
                } else {
                    input.classList.add('error');
                    input.addEventListener('input', () => {
                        if (isValidEmail(input.value)) input.classList.remove('error')
                    })
                }
            })
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Share
        document.getElementById("share-button").addEventListener("click", function () {
            if (navigator.share) {
                navigator.share({
                    title: 'Share with a friend!',
                    text: 'I’m really excited about this amazing health product, check out the details, I highly recommend it!',
                    url: 'https://elnutro.com/zLhRqrMJ' // Ссылка для поделиться [THANKS]
                }).then(() => {
                    console.log('Shared successfully!');
                }).catch((error) => {
                    console.log('Sharing failed', error);
                });
            } else {
                alert("Tu plataforma no admite la función de compartir.");
            }
        });

    </script>
    <script src="js/libs/moment-with-locales.min.js"></script>
    <script>
        const endDateEl = document.querySelector('.end-date');
        if(endDateEl) {
            moment.locale(document.documentElement.lang.split('-')[0]);
            endDateEl.innerText = moment().add(3, 'days').format('LL');
        }
    </script>
    <script src="js/back.js"></script>
    <script>
        window.vitBack(targetLink, true);
    </script>

</body>

</html>