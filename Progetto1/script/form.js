/* Azzeramento degli input */
function deleteInputs() {

	/* Prendo gli elementi */
	var inputs = document.getElementsByTagName('input');

	/* Cancello il loro valore */
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].value = null;
	}

}

/* Controllo che l'input non sia vuoto */
function isEmpty(value) {

	return value === null || value.match(/^ *$/) !== null;

}

/* Validazione */
function validate() {

	/* Testo di errore */
	var error = document.getElementById('error');
	error.innerHTML = "";

	/* Valori inseriti */
	var nome = document.getElementById('nome').value;
	var cognome = document.getElementById('cognome').value;
	var nascita = document.getElementById('nascita').value;
	var indirizzo = document.getElementById('indirizzo').value;
	var civico = document.getElementById('civico').value;
	var citta = document.getElementById('citta').value;
	var nap = document.getElementById('nap').value;
	var telefono = document.getElementById('telefono').value;
	var email = document.getElementById('email').value;
	var hobby = document.getElementById('hobby').value;
	var prof = document.getElementById('prof').value;

	/* RegEx */
	var letters = /^[a-zA-Z\u00C0-\u017F\-\' ]*$/;
	var digits = /^[\d]*$/;
	var alpha = /^[a-zA-Z]*$/;
	var telex = /^[\d\- ]*$/;
	var mailex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

	/* Controllo che nessuno degli obbligatori sia vuoto */
	if (isEmpty(nome) || isEmpty(cognome) || isEmpty(nascita) || isEmpty(indirizzo) || isEmpty(civico) || isEmpty(citta) || isEmpty(nap) || isEmpty(telefono) || isEmpty(email)) {

		error.innerHTML = "Compilare tutti i campi obbligatori";
		return;

	} else {

		/* Validazione nome */
		if (!letters.test(nome) || nome.length > 50) {
			error.innerHTML = "Nome non valido";
			return;
		}

		/* Validazione cognome */
		if (!letters.test(cognome) || cognome.length > 50) {
			error.innerHTML = "Cognome non valido";
			return;
		}

		/* Validazione data di nascita */
		var dob = document.getElementById('nascita').value;
		var today = new Date().toISOString().slice(0,10); 
		if (dob > today) {
			error.innerHTML = "Data di nascita non valida";
			return;
		}

		/* Validazione indirizzo */
		if (!letters.test(indirizzo) || indirizzo.length > 50) {
			error.innerHTML = "Indirizzo non valido";
			return;
		}

		/* Validazione numero civico */
		var last = civico.charAt(civico.length - 1);
		if (alpha.test(last)) {
			var num = civico.slice(0, -1);
			if (!digits.test(num) || num.length > 3 || num.length < 1) {
				error.innerHTML = "Numero civico non valido";
				return;
			}
		} else if (civico.length > 4 || !digits.test(civico)) {
			error.innerHTML = "Numero civico non valido";
			return;
		}

		/* Validazione città */
		if (!letters.test(citta) || citta.length > 50) {
			error.innerHTML = "Città non valida";
			return;
		}

		/* Validazione NAP */
		if (!digits.test(nap) || nap.length < 4 || nap.length > 5) {
			error.innerHTML = "NAP non valido";
			return;
		}

		/* Validazione Numero di telefono */
		telefono = telefono.replace(/\s+/g, '');
		if (telefono.charAt(0) == "+") {
			var num = telefono.substr(1);
			if (!telex.test(num) || num.length < 11 || num.length > 50) {
				error.innerHTML = "Numero di telefono non valido";
				return;
			}
		} else if (!telex.test(telefono) || telefono.length < 10 || telefono.length > 50) {
			error.innerHTML = "Numero di telefono non valido";
			return;
		}
		
		/* Validazione e-mail */
		if (!mailex.test(email) || email.length > 50) {
			error.innerHTML = "E-mail non valida";
			return;
		}

		/* Validazione hobby */
		if (!isEmpty(hobby) && (!letters.test(hobby) || hobby.length > 50)) {
			error.innerHTML = "Hobby non valido";
			return;
		}

		/* Validazione professione */
		if (!isEmpty(prof) && (!letters.test(prof) || prof.length > 50)) {
			error.innerHTML = "Professione non valida";
			return;
		}
		
	}

	/* Eseguo il submit dopo i controlli */
	document.getElementById('reg').submit();

}