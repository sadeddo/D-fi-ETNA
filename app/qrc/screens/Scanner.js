import react, {useState, useEffect} from "react";
import { Text, View, StyleSheet, Button, Linking } from "react-native";
import { BarCodeScanner } from "expo-barcode-scanner";

export default function Scanner(){
    const [hasPermission, setHasPermission] = useState(null);
    const [scanner, setScanner] = useState(null);

    
    useEffect(() => {
        (async () =>{
            const {status} = await BarCodeScanner.requestPermissionsAsync();
            setHasPermission(status === 'granted');
        })();
    }, []);
    
    const handleBarCodeScanner = ({data}) =>{

        test = data.split("|")[0]
        idd = data.split("|")[1]
        console.log(data)
        console.log(idd)
        var d = new Date();
        var hours = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        console.log(hours);

        
        if (hours < '09:10:00') {
            fetch(`http://192.168.1.24/api/emargement/${idd}`,{
                method: 'PUT',
                headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 'present',
                })
            })
        }else if ( ('10:30:00' < hours) && (hours < '09:10:00')){
            fetch(`http://192.168.1.24/api/emargement/${idd}`,{
                method: 'PUT',
                headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 'retard',
                })
            })
        }else if (('16:45:00' < hours)  && (hours < '20:00:00')){
            fetch(`http://192.168.1.24/api/emargement/${idd}`,{
                method: 'PUT',
                headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 'present',
                })
            })
        }else {
            fetch(`http://192.168.1.24/api/emargement/${idd}`,{
                method: 'PUT',
                headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 'absent',
                })
            })
        }
        
        
        setScanner(true);
        alert(`Le code qr  ${data} a été scanné`);
        console.log('\nData: ' + data)
    }
    if (hasPermission === null){
        return <Text>Demande de l'autorisation pour la caméra</Text>
    }
    if (hasPermission === false){
        return <Text>Pas d'accès à la caméra</Text>
    }
    return(
        <View style={styles.container}>
            <BarCodeScanner 
                onBarCodeScanned={scanner ? undefined : handleBarCodeScanner}
                style={StyleSheet.absoluteFillObject}
            />
            {scanner && <Button title='Scanner encore' onPress={()=> setScanner(false)}/> }
        </View>
    )
}

const styles = StyleSheet.create({
    container:{
        flex:1,
        flexDirection:'column',
        justifyContent:'center'
    }
})