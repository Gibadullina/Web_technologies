(function($) {
	Drupal.behaviors.plusone = {
		attach: function (context, settings) {
			$('a.plusone-link:not(.plusone-processed)', context).click( function() {
				$.ajax({
					type: 'POST',
					url: this.href,
					dataType: 'json',
					data: 'js=1',
					success: function(data) {
						// ���������� ���������� �������.
						$('div.score').text(data.total_votes);
						// ���������� ������ "Vote" ������� "You voted".
						$('div.vote').text(data.voted);					
					}
				});
				return false;
			})
			.addClass('plusone-processed');
		}
	}
})(jQuery);