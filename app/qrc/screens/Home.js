import { View, StyleSheet, Button } from 'react-native';
import react from 'react';
import { useNavigation } from '@react-navigation/native';

export default function Home(){
    const navigation = useNavigation();

    return(
        <View style = {styles.container}>
            <Button title='Scanner' onPress={()=> navigation.navigate('Scanner')}/>
        </View>
    );
}
const styles = StyleSheet.create({
    container:{
        flex:1,
        backgroundColor:'#fff',
        alignItems:'center',
        justifyContent:'center'
    }
})