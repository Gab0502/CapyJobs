window.addEventListener('load', () =>{
    registerSW()
})
async function registeSW(){
    if('serviceWorker' in navigation){
        await navigator.serviceWorker.register('./sw.js')
    } catch(e){
        console.log('SW registration failed');
    }
}