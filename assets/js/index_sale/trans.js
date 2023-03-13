const calc = async () => {
    //await connect()
    var amt = document.getElementById("bnbAmount").value;
    contract = new web3.eth.Contract(saleContractAbi, saleContractAddress);
    try{
        
    const res = await contract.methods.getTokenAmount(web3.utils.toWei(amt)).call();
    if(res){
        document.getElementById("tokenReduxAmount").value = res/1e18;
        console.log(res/1e18)
    }
    }catch(e){
        document.getElementById("tokenReduxAmount").value = 0;
    }
}
const calc2 = async () => {
    //await connect()
    var amt2 = document.getElementById("tokenReduxAmount").value;
    //var price = 0.0004;
    var bnbAmount = amt2 * 0.0004;
    document.getElementById("bnbAmount").value = bnbAmount;
}

async function buy()
{
    //await connect();
	if(Number(document.getElementById("tokenReduxAmount").value) < 1){
		return alert("Minimum buy Amount is 1000 Redux")
	}
	if(web3 == undefined){
		alert("Wallet not connected!")
		return
	}
	await buyWithBnb()
}

const buyWithBnb = async () => {
    //await connect()
    var str = await getAccountAddress()
    contract = new web3.eth.Contract(saleContractAbi, saleContractAddress);
    var amt = document.getElementById("bnbAmount").value;
    result = await contract.methods.buyToken(0).send({ from: str,value:web3.utils.toWei(amt) });
    if(result){
        alert("Purchase Completed!")
    }
}

async function getAccountAddress() {
	try {
		const accounts = await web3.eth.getAccounts();
		//console.log(accounts[0]);
		return accounts[0];
	} catch (e) { }
}