import React from "react";

const User = (props) => (
	<div className="container">
		{`Usuario: ${props.name} ${props.lastname}`} 
	</div>
);

export default User;