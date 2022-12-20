import React from 'react';
import Scanner from './screens/Scanner';
import Home from './screens/Home';
//import Axios from 'axios';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

const Stack = createNativeStackNavigator();


/*Axios ({
  url: 'http://localhost/19002',
  method: 'post',
  transformRequest: [function (data, headers) {
    return data;
  }],
  transformResponse: [function (data, headers) {
    return data;
  }],
  headers: {'X-Requested-With': 'XMLHttpRequest'},
  data: {
    name : 'login'
  },
})

Axios.post('http://localhost:8000/') 
.then(function (response) {
  return response.data;
})
.catch(function (error) {
  console.log(error);
})
fetch('http://localhost:19002'.then((response) =>
response.json()).then((json) => {
  return data;
}).catch((error) => {
  console.error(error);
}));

fetch('http://localhost:19002', {
  method: 'POST',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    newName: 'Some Name',
    id: 123
  })
});*/

function App(){
  return(
    <Stack.Navigator>
      <Stack.Screen  name="Home" component={Home}/>
      <Stack.Screen  name="Scanner" component={Scanner}/>
    </Stack.Navigator>
  );
};

export default () => {
  return(
    <NavigationContainer>
      <App/>
    </NavigationContainer>
  )
}