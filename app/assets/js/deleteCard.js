const listBtn = $$('.delBtn');

listBtn.forEach((element) => {
	element.addEventListener('click', (e) => {
		fetch('../app/lib/deleteCard.php', {
			method: 'POST',
			headers: {
				'Content-Type':
					'application/x-www-form-urlencoded; charset=UTF-8',
			},
			body: `id=${e.currentTarget.name}`,
		})
			.then((response) => response.text())
			.then((res) => {
				if (res) {
					const card = $(`#${res}`);
					card.parentNode.removeChild(card);
				}
				console.log(res);
			});
	});
});
