(function(){
	
	var Memory = {

		// Funcion para Iniciar
		init: function(cards){
			this.$game = $(".game");
			this.$modal = $(".modal");
			this.$overlay = $(".modal-overlay");
			this.$restartButton = $("button.restart");
			this.cardsArray = $.merge(cards, cards);
			this.shuffleCards(this.cardsArray);
			this.setup();
		},

		// Funcion Barajar Cartas
		shuffleCards: function(cardsArray){
			this.$cards = $(this.shuffle(this.cardsArray));
		},

		// Funcion Preparar
		setup: function(){
			this.html = this.buildHTML();
			this.$game.html(this.html);
			this.$memoryCards = $(".card");
			this.paused = false;
     	this.guess = null;
			this.binding();
		},

		// Funcion Unir
		binding: function(){
			this.$memoryCards.on("click", this.cardClicked);
			this.$restartButton.on("click", $.proxy(this.reset, this));
		},
		// Funcion Clic en Carta
		cardClicked: function(){
			var _ = Memory;
			var $card = $(this);
			if(!_.paused && !$card.find(".inside").hasClass("matched") && !$card.find(".inside").hasClass("picked")){
				$card.find(".inside").addClass("picked");
				if(!_.guess){
					_.guess = $(this).attr("data-id");
				} else if(_.guess == $(this).attr("data-id") && !$(this).hasClass("picked")){
					$(".picked").addClass("matched");
					_.guess = null;
				} else {
					_.guess = null;
					_.paused = true;
					setTimeout(function(){
						$(".picked").removeClass("picked");
						Memory.paused = false;
					}, 600);
				}
				if($(".matched").length == $(".card").length){
					_.win();
				}
			}
		},

		// Funcion has ganado
		win: function(){
			this.paused = true;
			setTimeout(function(){
				Memory.showModal();
				Memory.$game.fadeOut();
			}, 1000);
		},

		// Funcion Mostrar Carta
		showModal: function(){
			this.$overlay.show();
			this.$modal.fadeIn("slow");
		},

		// Funcion Ocultar Carta
		hideModal: function(){
			this.$overlay.hide();
			this.$modal.hide();
		},

		// Funcion Reseteo
		reset: function(){
			this.hideModal();
			this.shuffleCards(this.cardsArray);
			this.setup();
			this.$game.show("slow");
		},

		// Algoritmo barajar
		shuffle: function(array){
			var counter = array.length, temp, index;
	   	// While there are elements in the array
	   	while (counter > 0) {
        	// Pick a random index
        	index = Math.floor(Math.random() * counter);
        	// Decrease counter by 1
        	counter--;
        	// And swap the last element with it
        	temp = array[counter];
        	array[counter] = array[index];
        	array[index] = temp;
	    	}
	    	return array;
		},

		buildHTML: function(){
			var frag = '';
			this.$cards.each(function(k, v){
				frag += '<div class="card" data-id="'+ v.id +'"><div class="inside">\
				<div class="front"><img src="'+ v.img +'"\
				alt="'+ v.name +'" /></div>\
				<div class="back"><img src="./images/juegoAlberto_descent/Reverso.png"\
				alt="Reverso" /></div></div>\
				</div>';
			});
			return frag;
		}
	};

	// Array de cartas con su imagen e id
	var cards = [
		{
			name: "Ashrian",
			img: "./images/juegoAlberto_descent/Ashrian.png",
			id: 1,
		},
		{
			name: "Avric",
			img: "./images/juegoAlberto_descent/Avric-albright.png",
			id: 2
		},
		{
			name: "Grisban",
			img: "./images/juegoAlberto_descent/Grisban-el-sediento.png",
			id: 3
		},
		{
			name: "Jain",
			img: "./images/juegoAlberto_descent/Jain-bosquebello.png",
			id: 4
		}, 
		{
			name: "Leoric",
			img: "./images/juegoAlberto_descent/Leoric-del-libro.png",
			id: 5
		},
		{
			name: "Syndrael",
			img: "./images/juegoAlberto_descent/Syndrael.png",
			id: 6
		},
		{
			name: "Tumbo",
			img: "./images/juegoAlberto_descent/Tumbo-cavadura.png",
			id: 7
		},
		{
			name: "Viuda",
			img: "./images/juegoAlberto_descent/Viuda-tarha.png",
			id: 8
		},
		{
			name: "Roganna",
			img: "./images/juegoAlberto_descent/Roganna_the_shade.png",
			id: 9
		},
	];
	
	// Iniciar Juego
	Memory.init(cards);


})();