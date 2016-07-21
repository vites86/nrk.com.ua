-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2015 г., 00:22
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fond`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `meta_t` varchar(255) DEFAULT NULL,
  `meta_d` varchar(255) DEFAULT NULL,
  `text_` text,
  `date_` datetime DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author`, `title`, `description`, `meta_t`, `meta_d`, `text_`, `date_`, `img`) VALUES
  (6, 
  'Герчак Сергій', 
  'ВІТАЄМО ВСІХ НАШИХ ДРУЗІВ ІЩЕ ІЗ ОДНІЄЮ НАШОЮ МАЛЕНЬКОЮ СПІЛЬНОЮ ПЕРЕМОГОЮ!!!', 
  'Дякуємо всім хто приймав участь у її наближенні на кожному етапі!!!', 
  'допомога, благодійний фонд, АТО', 'допомога, благодійний фонд, АТО', 
  'ВІТАЄМО ВСІХ НАШИХ ДРУЗІВ ІЩЕ ІЗ ОДНІЄЮ НАШОЮ МАЛЕНЬКОЮ СПІЛЬНОЮ ПЕРЕМОГОЮ!!!
<p>Дякуємо всім хто приймав участь у її наближенні на кожному етапі!!!</p>
<p>Коротко про суть: До нас надійшло прохання про виготовлення костюмів «Горка» за спеціальним замовленням від розвідувального взводу. Здавалося б дуже просте завдання, але це тоді, коли цю роб</p>оту виконував вже хтось до тебе, однак, як я вже було сказано, замовлення було спеціальне, з певними жорсткими вимогами до змісту та наповнення, конкретними експлуатаційними властивостями, тому довелося виконувати роботу починаючи від розробки моделей. Однак, незважаючи на перепони , як, наприклад, брак тканини із певними характеристиками, яку нам довелося закуповувати частинами, через її відсутність на ринку, чекати наступних надходжень і викуповувати її при першій ліпшій нагоді, ми із завданням справилися на «відмінно» В результаті хлопці отримали волого та термостійкі костюми, що повністю відповідають заявленим експлуатаційним вимогам. Дякуємо всім, хто допомагав коштами, всім хто незважаючи на важкі умови йшов нам назустріч у здійсненні задуманого. Особливі слова подяки за допомогу у виготовленні виробів висловлюємо колективу компанії «3СМАРКЕТ»,, зокрема керівникам: Крючкову Ігорю Григоровичу та Дорофєєву Миколі Володимировичу, а також співробітникам: Голуб Вірі Василівні, Пісковій Оксані Петрівні, Кутах Людмилі Миколаєвні.
<p>Фотозвіт надаємо нижче, фото від закупівлі комплектуючих до експлуатації виробів замовниками в бойових умовах, включаючи готові вироби та примірку.</p>
<p>P.S.Приємно також усвідомлювати, що наші костюми до хлопців потрапили дуже вчасно, якраз перед дощами, отже і випробування пройшли і хлопців добре від негоди захистили , сподіваємось, що зах</p>ищатимуть і надалі.
<p>Не дивлячись на успіх розслаблятися зарано, попереду зима, тому у нас ще дуже багато роботи. Всім хто хотів би долучитись до допомоги пишіть на сторінку Всеукраїнського благодійного фонду «Н</p>АШ РІДНИЙ КРАЙ» Кошти можна перераховувати на рахунки:
<p>Благодійна організація " Всеукраїнський благодійний фонд«НАШ РІДНИЙ КРАЙ»</p>
<p>Ідентифікаційний код юридичної особи: 39504347</p>
<p>Реквізии гривневого рахунку:</p>
<p>Р/р 26002052745800</p>
<p>МФО:300711</p>
<p>ОКПО:39504347</p>
<p>Печерська філія ПАТ КБ "ПриватБанк"</p>
<p>Картки «Приватбанку»</p>
<p>Гривневий рахунок</p>
<p>Для поповнення готівкою у відділеннях Приватбанку необхідно вказати операціоністу номер рахунку для поповнення 5168755611910999 отримувач Герчак Сергій Михайлович.</p>
<p>Для поповнення готівкою в інших українських банках</p>
<p>Отримувач платежу : Герчак Сергій Михайлович</p>
<p>Код ОКПО отримувача: 14360570</p>
<p>Установа банку : Приватбанк</p>
<p>МФО банку : 305299</p>
<p>Код ОКПО банку: 14360570</p>
<p>Рахунок отримувача: 29244825509100</p>
<p>Для поповнення карти 5168755611910999</p>
<p>Рахунок в євро</p>
<p>BENEFICIARI: GERCHAK SERGEJ</p>
<p>IBAN: UA963052990005168757285828390</p>
<p>ACCOUNT: 5168757285828390</p>
<p>BANK OF BENEFICIARI: PRIVATBANK SWIFT CODE: PBANUA2X</p>
<p>INTERMEDIARY BANK: Commerzbank AG Frankfurt am Main Germany SWIFT CODE: COBADEFF</p>
<p>CORRESPONDENT ACCOUNT: 400886700401</p>
<p>Рахунок в доларах</p>
<p>BENEFICIARI: GERCHAK SERGEJ</p>
<p>IBAN: UA12305299000 5168 7572 8582 6410</p>
<p>ACCOUNT: 5168 7572 8582 6410</p>
<p>BANK OF BENEFICIARI: PRIVATBANK SWIFT CODE: PBANUA2X</p>
<p>INTERMEDIARY BANK: IP MORGAN CHASE BANK SWIFT CODE: CHASUS33</p>
<p>CORRESPONDENT ACCOUNT: 0011000080</p>', 
  '2015-09-24 12:15:00', 
  'img/news/6.jpg')


CREATE TABLE IF NOT EXISTS `pressa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date_` datetime DEFAULT NULL,
  `source` DEFAULT NULL,
  `meta_t` varchar(255) DEFAULT NULL,
  `meta_d` varchar(255) DEFAULT NULL,
  `text_` text, 
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into `pressa` VALUES 
  (1,'ЦЕНТР ВОЛОНТЕРОВ НАШ РОДНОЙ КРАЙ',
    '01.04.2015',
     'ТРК НИС-ТВ',
    'волонтери, АТО, допомога військовим',
    'волонтери, АТО, допомога військовим',
    'В біді познаються не лише друзі, а й волонтери. В Україні чимало людей, які здатні відкласти власні інтереси аби допомогти тим, хто у скруті. "Чужої біди не буває",- так вважають волонтери благодійного фонду НАШ РІДНИЙ КРАЙ...',
    'img/pressa/1.png','https://www.youtube.com/watch?v=7cUo5hiYgTw');

  insert into `pressa` VALUES 
  (2,'У Києві стартує всеукраїнський благодійний рок-фестиваль «Україна-це Я»',
     '28.05.2015',
     'Майдан Прес Центр',
    'волонтери, АТО, допомога військовим',
    'волонтери, АТО, допомога військовим',
    'Українське суспільство перестало перейматись війною в країні, проблемами бійців в АТО та постраждалих від втрати рідних сімей. Нині, зустрічаючи волонтерів у вагоні метро, які збирають гроші на хворих дітей, людей з обмеженими фізичними можливостями чи постраждалих бійців АТО, люди роблять вигляд, що не помічають їх. Чи це від недовіри, чи від того, що війна стала буденною.',
    'img/pressa/2.png','http://goo.gl/xRY9rw')



    insert into `pressa` VALUES 
  (3,'Сергій Герчак',
     '05.09.2015',
     'Незламні духом',
    'волонтери, АТО, допомога військовим',
    'волонтери, АТО, допомога військовим',
    'В житті немає нічого сталого - постійні лише зміни. Криза - це крах старих форм та пошук нових. Це руйнування комфортного стану і перехід в стан змін, часом складних і непередбачуваних. Саме криза змушує відповідати на запитання:"Що робити?". Розпочинається пошук варіантів як не просто вижити, а змінити якість життя.',
    'img/pressa/3.png','https://www.youtube.com/watch?v=JG3I1xImE8M')

   insert into `pressa` VALUES 
  (4,'ВОПРОСЫ БЕЗ ОТВЕТОВ УКРАИНСКОГО ВОЛОНТЕРА',
     '18.07.2015',
     'BERLIN-VISUAL',
    'зона АТО, в полях под Славянском и Амвросиевкой',
    'зона АТО, в полях под Славянском и Амвросиевкой',
    'В житті немає нічого сталого - постійні лише зміни. Криза - це крах старих форм та пошук нових. Це руйнування комфортного стану і перехід в стан змін, часом складних і непередбачуваних. Саме криза змушує відповідати на запитання:"Що робити?". Розпочинається пошук варіантів як не просто вижити, а змінити якість життя.',
    'img/pressa/4.png','http://goo.gl/a7h6iG')




