function scrDeleteDB() {
	if(confirm('Вы дейсвительно хотите удалить текущую Базу Данных?')) {
		window.location.href = "uninstall.php";
        return true;}
	else {
		return false;
	}
}

function scrDeleteElement() {
	if(confirm('Вы дейсвительно хотите удалить запись? Это может повлечь за собой удаление записей из других таблиц!')) {
		return true;}
	else {
		return false;
	}
}

function scrUpdateElement() {
	if(confirm('Вы дейсвительно хотите изменить запись? Это может повлечь за собой изменение записей в других таблиц!')) {
		return true;}
	else {
		return false;
	}
}