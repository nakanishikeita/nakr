$(function() {

  var CHAR_TYPE = {
    'HIRAGANA': 0,
    'KATAKANA': 1,
    'ALPHABET': 2
  };

  var OUTPUT_NUM = 1;

  $('.js-gen-button').click(function() {
    generate();
  });

  $('.js-input-area').keydown(function(e) {
    if (e.which == 13) {
      generate();
    }
  });

  function generate() {

    if ($('.js-input-area').val().length === 0) {
      alert('「？？？」や「？？た」のように入力してください');
      return 0;
    }

    var index = [],
        charArray = [],
        result = [],
        inputType = getCheckedItem('value'),
        inputString = getInputString();
    
    charArray = loadCharArray(inputType);
    index = findSpecifiedChar(inputString, ['?', '？']);

    result = generateName(inputString, inputType, index, charArray);

    showResult(result);
  }


  function getCheckedItem(attr) {
    return $('input[name="type"]:radio:checked').attr(attr);
  }

  function getInputString() {
    return $('input[name="word"]').val();
  }

  function findSpecifiedChar(inputString, keyword) {
    var index = [],
        arr = inputString.split('');

    for (var i = 0; i < inputString.length; i++) {
      for (var j = 0; j < keyword.length; j++) {
        if (arr[i] === keyword[j]) {
          index.push(i);
        }
      }
    }

    return index;
  }

  function loadCharArray(inputType) {
    var src = "",
        json = {};

    if (inputType == CHAR_TYPE.HIRAGANA || inputType == CHAR_TYPE.KATAKANA) {
      src = "freq_hiragana.json";
    } else if (inputType == CHAR_TYPE.ALPHABET) {
      src = "freq_alphabet.json";
    } else if (inputType == CHAR_TYPE.KANJI) {
      src = "freq_hiragana.json";
    }

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8888/nakr_o/assets/' + src,
      // url: 'http://www.nakr.net/assets/' + src,
      async: false,
      dataType: 'json',
      success: function(data) {
        json = data;
      }
    });

    return json;
  }

  function generateName(inputString, inputType, index, charArray) {
    var total = 0,
        str = inputString.split(''),
        items = charArray.items,
        retArr = [];

    for (var h = 0; h < items.length; h++) {
      total += items[h].probability;
    }

    for (var i = 0; i < OUTPUT_NUM; i++) {
      for (var j = 0; j < index.length; j++) {
        var rnd = Math.floor(Math.random() * total);
        for (var k = 0, lower = 0, higher = 0; k < items.length; k++) {
          lower = higher;
          higher += items[k].probability;

          if (lower <= rnd && rnd < higher) {
            if (inputType == CHAR_TYPE.KATAKANA) {
              str[index[j]] = hiraganaToKatakana(items[k].character);
            } else {
              str[index[j]] = items[k].character;
            }
          }
        }
      }
      retArr.push(str.join(''));
    }

    return retArr;
  }

  function showResult(result) {
    for (var i = 0; i < result.length; i++) {
      var $ul = $('.output > ul');

      if ($ul.children().length < result.length) {
        $('<li>' + result[i] + '</li>').addClass('name-' + i).addClass('item').appendTo($ul);
      } else {
        $('.name-' + i).html(result[i]);
      }
      
    }
  }

  function hiraganaToKatakana(src) {
    return src.replace(/[\u3041-\u3096]/g, function(match) {
        var chr = match.charCodeAt(0) + 0x60;
        return String.fromCharCode(chr);
    });
  }

});