import { Injectable } from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class LoggerService {
    
    constructor(private level: string) {

    }
    setLevel(level: string) {
        this.level;
    }

    debug(msg: string) {}
    warn(msg: string) {}
    error(msg: string) {}
}