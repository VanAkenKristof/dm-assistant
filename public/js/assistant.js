const charName = $("[name='charname']").val();
const stats = [
    "Strength",
    "Dexterity",
    "Constitution",
    "Wisdom",
    "Intelligence",
    "Charisma",
];

if (annyang) {
    let commands = {
        "roll initiative": function () {
            let initiative = $("[name='initiative']").val();
            initiative = parseInt(initiative.replace('+', ''));
            initiative += Math.floor((Math.random() * 20) + 1);

            alert('Your initiative is ' + initiative);
        },
        "I buy a beer": function () {
            let value = parseInt($("[name='cp']").val()) - 1;
            $("[name='cp']").val(value);
            update("cp", value);
        },
        "Round of beers on me": function () {
            let value = parseInt($("[name='cp']").val()) - 5;
            $("[name='cp']").val(value);
            update("cp", value);
        },
        "Reset money" : function () {
            $("[name='cp']").val(30);
            update("cp", 30);
        },
        "Reroll stats": function () {
            stats.forEach(function (stat) {
                let roll = rollStat();

                update(stat.toLowerCase(), roll);
                $("[name='" + stat + "score']").val(roll)
            });
        },
        "Reset stats" : function () {
            $("[name='Strengthscore']").val(16);
            $("[name='Dexterityscore']").val(8);
            $("[name='Constitutionscore']").val(14);
            $("[name='Wisdomscore']").val(10);
            $("[name='Intelligencescore']").val(8);
            $("[name='Charismascore']").val(16);

            stats.forEach(function (stat) {
                return update(stat, $("[name='" + stat + "score']").val());
            });
        }
    };

    //damage
    for (let i = 0; i < 1000; i++) {
        commands[charName + " takes " + i + " damage"] = function () {
            takeDamage(i);
            update("current_hp", $("[name='currenthp']").val());
        }
    }

    //healing
    for (let i = 0; i < 1000; i++) {
        commands[charName + " heals " + i] = function () {
            healsHitpoints(i);
            update("current_hp", $("[name='currenthp']").val());
        }
    }

    annyang.addCommands(commands);
    annyang.start();
}

let update = function (key, value) {
    let data = {};
    data[key] = value;

    return $.ajax({
        url: '/update',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'data':  data
        }
    }).done(function (data) {
        console.log(data);
    });
};

let takeDamage = function (damage) {
    let currentHp = $("[name='currenthp']").val();
    currentHp -= damage;

    if (0 > currentHp) {
        currentHp = 0;
    }

    $("[name='currenthp']").val(currentHp);
};

let healsHitpoints = function (heal) {
    let currentHp = parseInt($("[name='currenthp']").val());
    const maxHp = parseInt($("[name='maxhp']").val());
    currentHp += heal;

    if (currentHp > maxHp) {
        currentHp = maxHp;
    }

    $("[name='currenthp']").val(currentHp);
};

let rollStat = function () {
    let numbers = [];
    let total = 0;

    for (let i = 0; i < 4; i++) {
        numbers.push(Math.floor(Math.random() * 6) + 1);
    }

    var min = Math.min.apply(null, numbers);
    numbers = numbers.filter((e) => {return e != min});

    numbers.forEach(function (number) {
        total += number;
    });

    return total;
};

rollStat();

let removeSmallest = function(arr) {
    var min = Math.min.apply(null, arr);
    return arr.filter((e) => {return e != min});
};
