import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
import { getAuth, GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBqYupXVyV-3TW1IAkpM3Lq5aFfJAovmqI",
  authDomain: "coffmunnity.firebaseapp.com",
  projectId: "coffmunnity",
  storageBucket: "coffmunnity.firebasestorage.app",
  messagingSenderId: "749646830148",
  appId: "1:749646830148:web:248c29699c790c0e26ba11"
};

const app = initializeApp(firebaseConfig);

export const auth = getAuth(app);
export const provider = new GoogleAuthProvider();