import { useState, createContext } from "react";

export const TokenContext = createContext();

export function TokenProvider({children}){
    const [_token, setToken] = useState( _token ?? null);
    
    return(
        <TokenContext.Provider value={{_token, setToken }}>
            {children}
        </TokenContext.Provider>
    )
}