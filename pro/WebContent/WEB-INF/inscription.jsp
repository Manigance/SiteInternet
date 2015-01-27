<%@ page pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Inscription</title>
<!-- BOOTSRAP -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- Optional theme -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link type="text/css" rel="stylesheet"
	href="<c:url value="/inc/form.css"/>" />
</head>
<body>
	<form method="post" action="inscription">
		<fieldset>
			<legend>Inscription</legend>
			<p>Vous pouvez vous inscrire via ce formulaire.</p>

			<label for="exampleInputEmail1">Adresse email <span
				class="requis">*</span></label> <input type="email" class="form-control"
				id="exampleInputEmail1" name="email"
				value="<c:out value="${utilisateur.email}"/>" size="20"
				maxlength="60" /> <span class="erreur">${form.erreurs['email']}</span>
			<br /> <label for="exampleInputPassword1">Mot de passe <span
				class="requis">*</span></label> <input type="password" class="form-control"
				id="exampleInputPassword1" placeholder="Enter password"
				name="motdepasse" value="" size="20" maxlength="20" /> <span
				class="erreur">${form.erreurs['motdepasse']}</span> <br /> <label
				for="exampleInputPassword1">Confirmation du mot de passe <span
				class="requis">*</span></label> <input type="password" class="form-control"
				id="exampleInputPassword1" name="confirmation" value="" size="20"
				maxlength="20" /> <span class="erreur">${form.erreurs['confirmation']}</span>
			<br /> <label for="exampleInputEmail1">Nom d'utilisateur</label> <input
				type="text" class="form-control" id="exampleInputEmail1" name="nom"
				value="<c:out value="${utilisateur.nom}"/>" size="20" maxlength="20" />
			<span class="erreur">${form.erreurs['nom']}</span> <br /> <input
				type="submit" value="Inscription" class="btn btn-success" /> <br />

			<p class="${empty form.erreurs ? 'succes' : 'erreur'}">${form.resultat}</p>
		</fieldset>
	</form>
</body>
</html>