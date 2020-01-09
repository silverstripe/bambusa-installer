import React, { useState } from 'react';
import { render } from 'react-dom';
import Autosuggest from 'react-autosuggest';
import PropTypes from 'prop-types';
import debounce from 'debounce';
import isMobile from 'ismobilejs';

let controller;
const hasAbort = 'signal' in new Request('');
const doFetch = hasAbort
  ? (url, options = {}) => {
    controller = new AbortController();
    const { signal } = controller;
    return fetch(url, { ...options, signal });
  }
  : fetch;
const getSuggestions = (value, locale) => {
  const inputValue = value.trim().toLowerCase();
  const inputLength = inputValue.length;
  if (!inputLength) {
    return [];
  }
  return doFetch(`/search.php?q=${value}&l=${locale}`);
};

const getSuggestionValue = doc => doc.Page_Title;

const renderSuggestion = doc => (
  <a href={doc.Page_Link}>
    <h6>{doc.Page_Title}</h6>
  </a>
);

const shouldRenderSuggestions = value => value.trim().length > 2;

const onSuggestionSelected = (event, { suggestion }) => {
  event.preventDefault();
  window.location.href = suggestion.Page_Link;
};

const SearchInput = ({ locale, initialValue }) => {
  const [suggestions, setSuggestions] = useState([]);
  const [currentValue, setValue] = useState(initialValue);
  const onChange = (event, { newValue }) => {
    setValue(newValue);
  };

  const updateSuggestions = async ({ value }) => {
    // eslint-disable-next-line no-unused-expressions
    controller && controller.abort();
    try {
      const response = await getSuggestions(value, locale);
      const json = await response.json();
      setSuggestions(json.response.docs);
    } catch (err) {
      if (err.name !== 'AbortError') {
        throw err;
      }
    }
  };

  const clearSuggestions = () => {
    setSuggestions([]);
  };

  const inputProps = {
    name: 'q',
    'aria-label': 'search',
    className: 'form-control',
    placeholder: 'Search...',
    value: currentValue,
    onChange,
  };

  return (
    <Autosuggest
      suggestions={suggestions}
      onSuggestionsFetchRequested={debounce(updateSuggestions, 300)}
      onSuggestionsClearRequested={clearSuggestions}
      getSuggestionValue={getSuggestionValue}
      renderSuggestion={renderSuggestion}
      shouldRenderSuggestions={shouldRenderSuggestions}
      focusInputOnSuggestionClick={!isMobile.any}
      onSuggestionSelected={onSuggestionSelected}
      inputProps={inputProps}
    />

  );
};

SearchInput.propTypes = {
  locale: PropTypes.string.isRequired,
  initialValue: PropTypes.string,
};

SearchInput.defaultProps = {
  initialValue: '',
};


const search = () => {
  const holders = document.querySelectorAll('form .autosuggest');
  Array.from(holders).forEach((holder) => {
    const input = holder.querySelector('input');
    render(
      <SearchInput
        initialValue={input.value}
        locale={holder.getAttribute('data-locale')}
      />,
      holder,
    );
  });
};

export default search;
