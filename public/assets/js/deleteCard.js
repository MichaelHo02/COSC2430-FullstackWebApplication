const listBtn = $$('.delBtn');

listBtn.forEach((element) => {
	element.addEventListener('click', (e) => {
		fetch('?func=deleteCard', {
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
					console.log(res);
					const card = $(`#${res}`);
					console.log(card);
					card.parentNode.removeChild(card);
				}
				console.log(res);
			});
	});
});
