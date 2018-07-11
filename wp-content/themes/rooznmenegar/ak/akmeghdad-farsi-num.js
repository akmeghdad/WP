(function(e) {
	e.fn.persiaNumber = function() {
		this.find("*").andSelf().contents().each(
				function() {
					if (this.nodeType === 3) {
						this.nodeValue = this.nodeValue.replace(this.nodeValue
								.match(/[0-9]*\.[0-9]+/), function(e) {
							return e.replace(/\./, ",")
						});
						this.nodeValue = this.nodeValue
								.replace(/\d/g,
										function(ehh) {
											return String.fromCharCode(ehh
													.charCodeAt(0) + 1728)
										})
					}
				})
	}
})(jQuery)
