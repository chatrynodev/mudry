function validateAeroports() {       
        let aeroportDepart = document.getElementsByName('id_Aeroport_Depart')[0];
        let aeroportArrivee = document.getElementsByName('id_Aeroport_Arrivee')[0];
        aeroportDepart.addEventListener('change', function() {
            if (aeroportDepart.value === aeroportArrivee.value) {
                alert('L\'aéroport de départ et l\'aéroport d\'arrivée ne peuvent pas être les mêmes.');
                aeroportDepart.value = '';
                aeroportArrivee.value = '';
                aeroportDepart.focus();
            }

        });
        return true;
    }