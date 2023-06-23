window.onload = function () {
    var title = document.querySelector('.match_name');
    var image = document.querySelector('.card_img');
    var like = document.querySelector('.match');
    var dislike = document.querySelector('.unmatch');
    var timetosleep = document.querySelector('h1.d-flex');
    var count = 0;
    var fulldiv = document.querySelector('div.match_card:nth-child(1)');
    var i = 0;
    title.innerHTML = `${fighters_name[i]} ${fighters_lastname[i]} ${fighters_poids[i]} ${fighters_age[i]} ans`;
    image.src = `users/${fighters_id[i]}.png`;
    image.setAttribute("id", fighters_id[i]);
    fighters_id.forEach(id => {
        count++;
    });
    if (i == count) {
        fulldiv.innerHTML = "<img src=\"videos/ko.gif\"><div class=\"finito_pepo\">Désolé il n'y a plus personne disponnible pour se bagarer</div>";
        timetosleep.innerHTML = "Time to sleep brah";
    }


    like.onclick = function () {
        $.ajax({
            method: "POST",
            url: "controllers/controller.like.php",
            data: {
                "id": fighters_id[i],
            },

        })
        i++;

        title.innerHTML = `${fighters_name[i]} ${fighters_lastname[i]} ${fighters_poids[i]} ${fighters_age[i]} ans`;
        image.src = `users/${fighters_id[i]}.png`;
        image.setAttribute("id", fighters_id[i])


        if (i == count) {
            fulldiv.innerHTML = "<img src=\"videos/ko.gif\"><div class=\"finito_pepo\">Désolé il n'y a plus personne disponnible pour se bagarer</div>";
            timetosleep.innerHTML = "Time to sleep brah";
        }


    }
    dislike.onclick = function () {
        $.ajax({
            method: "POST",
            url: "controllers/controller.dislike.php",
            data: {
                "id": fighters_id[i],
            },

        })
        i++;
        title.innerHTML = `${fighters_name[i]} ${fighters_lastname[i]} ${fighters_poids[i]} ${fighters_age[i]} ans`;
        image.src = `users/${fighters_id[i]}.png`;
        image.setAttribute("id", fighters_id[i])


        if (i == count) {
            fulldiv.innerHTML = "<img src=\"videos/ko.gif\"><div class=\"finito_pepo\">Désolé il n'y a plus personne disponnible pour se bagarer</div>";
            timetosleep.innerHTML = "Time to sleep brah";
        }
    }


}