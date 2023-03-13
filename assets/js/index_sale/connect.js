"use strict";

// Unpkg imports
let Web3Modal = window.Web3Modal.default;
let WalletConnectProvider = window.WalletConnectProvider.default;

// Web3modal instance
let web3Modal

// Chosen wallet provider given by the dialog window
let provider;
let web3;

async function init() {
	console.log("Initializing example");
	console.log("WalletConnectProvider is", WalletConnectProvider);
	
	const providerOptions = {
		walletconnect: {
			package: WalletConnectProvider,
			options: {
				// Mikko's test key - don't copy as your mileage may vary
				infuraId: "938bfaad54224953ae35f8bc7160b911",
				rpc: {
					56: "https://bsc-dataseed.binance.org",
				},
			}
		},
	};

	web3Modal = new Web3Modal({
		//cacheProvider: false, // optional
		providerOptions, // required
		//disableInjectedProvider: true
	});
}
//window.onload = connect()

async function connect() {
	try {
		try {
			provider = await web3Modal.connect('walletconnect');
		} catch (e) {
			console.log("Could not get a wallet connection", e);
			return;
		}// Get a Web3 instance for the wallet
		web3 = new Web3(provider);
		let chainId = await web3.eth.getChainId();
		console.log(chainId) // 56
		if(chainId != 56){
			//await switchNetwork()
		}
		const accounts = await web3.eth.getAccounts();
		const account = accounts[0];
		//console.log(accounts);
		if(account){
		   document.getElementById("walletconnectbtn").innerHTML = account.substring(0, 6) + "..."+  account.substring(38, 42) ;    
		    //document.getElementById("connectbtn2").innerHTML = account.substring(0, 6) + "..."+  account.substring(38, 42) ;    
			//await switchNetwork()
		}
		//load()
	} catch (e) {
		console.log(e);
	}

}

window.addEventListener('load', async () => {
	init();
	connect()
});


async function switchNetwork(){
	
	try {
		await ethereum.request({
		  method: 'wallet_switchEthereumChain',
		  params: [{ chainId: '0x38' }],
		});
	  } catch (switchError) {
		// This error code indicates that the chain has not been added to MetaMask.
		if (switchError.code === 4902) {
		  try {
			await ethereum.request({
			  method: 'wallet_addEthereumChain',
			  params: [
				{
				  chainId: '0x38',
				  chainName: 'Smart Chain',
				  rpcUrls: ['https://bsc-dataseed.binance.org/'] /* ... */,
				  blockExplorerUrls: ['https://bscscan.com/'],
				  nativeCurrency: {
					name: 'Binance',
					symbol: 'BNB', // 2-6 characters long
					decimals: 18
				  }
				},
			  ],
			});
		  } catch (addError) {
			// handle "add" error
		  }
		}
		// handle other "switch" errors
	  }
	}