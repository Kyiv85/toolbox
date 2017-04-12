<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stock - Productos</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.4/react-with-addons.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		
	</div>
	<script>
		/*$(document).ready(function() {
  			ReactClientComponent = React.createClass({
		    getInitialState: function() {
		      return ({});
		    },
		    componentDidMount: function() {
		      var promise = $.get('http://localhost/toolbox/ej2.php?products//');
		      var _this = this;
		 
		      promise.done(function(response){
		        var data = response.data.children;
		        _this.setState({
		          data: data
		        });
		      });
		    },
		    render: function() {
		      var content;
		      if(this.state.data) {
		        content = this.state.data.map(function(element, index){
		           
		          return (
		            <li key={element.data.id}>
		              <a href={element.data.url}>
		                {element.data.title}
		              </a>
		            </li>
		          );
		        }); 
		      }
		      return (
		        <div>
		          <h1>Stock de productos</h1>
		          <ul>
		            {content}
		          </ul>
		        </div>
		      );
		    }
		  });
		 
		  React.render(
		    <ReactClientComponent />,
		    document.getElementById('container')
		  );
		});*/
		import React from 'react';
import ReactDOM from 'react-dom';

class HelloWorld extends React.Component{
  render(){
    return <div>Hello world!</div>
  }
}

ReactDOM.render(
  <HelloWorld />,
  document.getElementById('container')
);
	</script>
</body>
</html>