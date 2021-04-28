import normalize from 'normalize.css';
import "./index.scss";

import { parseTimeData } from '@/utils';

const now = +new Date();
const lastDate = new Date('2021/05/15');
const time = lastDate.getTime() - now;

parseTimeData(time);
