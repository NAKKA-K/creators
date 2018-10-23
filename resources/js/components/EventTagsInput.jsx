import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class EventTagsInput extends Component {
    constructor(props) {
        super(props);
        this.state = {tagsText: "", splitedTags: []};
    }

    // HACK: I want used const variable.
    splitTagsWithSpace(e) {
        let tagsText = e.target.value;
        let splitedTags = tagsText.split(" ");
        let error = null;
        if(splitedTags.length > 3){
            error = "タグは3つまでです";
            splitedTags = splitedTags.slice(0, 3);
            tagsText = splitedTags.join(" ");
        }
        this.setState({tagsText: tagsText, splitedTags: splitedTags, error: error});
    }

    render() {
        const tags = this.state.splitedTags.map((v, i) => (
            <span key={i}><span className="tag-highlight">{v}</span> </span>
        ));

        return (
            <div>
                <div className="text-overlay-wrapper">
                    <div className="text-overlay">{tags}</div>
                    <input type="text" name="tags"
                        placeholder="ジャンル: web,ゲーム,3DCG等を半角スペース区切り"
                        onChange={this.splitTagsWithSpace.bind(this)}
                        value={this.state.tagsText}
                        className={`form-control form-control-lg tag-text ${ this.state.error ? "is-invalid" : "" }`} />
                </div>
                <div className="invalid-error">
                    { this.state.error ? this.state.error : "" }
                </div>
            </div>
        );
    }
}

if (document.getElementById('event_tags_input')) {
    ReactDOM.render(<EventTagsInput />, document.getElementById('event_tags_input'));
}

