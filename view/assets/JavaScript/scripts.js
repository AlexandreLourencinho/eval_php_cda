// function compter() {
//     let compt = 5;
//     while (compt > 0) {
//         compt--;
//         document.getElementById('compteur').innerHTML = compt;
//     }
// }

const form = document.getElementById('envoi');

form.onclick = setTimeout(setInterval(function () {
        let compt = document.getElementById('compteur').innerText;
        compt = parseInt(compt, 10);
        console.log(compt);
        compt--;
        document.getElementById('compteur').innerHTML = compt;
    },
    1000), 1000);

const supform = document.getElementById('supprform');

supform.onsubmit = function () {
    return confirm('Êtes vous sûr de vouloir supprimer ce disque? la suppression est irréversible.');
}
const formmodif = document.getElementById('formmodif');

formmodif.onsubmit = function () {
    return confirm('Êtes vous sûr de vouloir supprimer ce disque? la suppression est irréversible.');
}